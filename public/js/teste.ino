/*  control Home
  
    (c)  Sergio Salomao 28.10.2019 - BR-Arduino.org
    Usage of the works is permitted provided that this instrument is retained 
    with the works, so that any entity that uses the works is notified of 
    this instrument. DISCLAIMER: THE WORKS ARE WITHOUT WARRANTY. 
    */

//Pacotes utilizados
#include <SPI.h>      /*comentario */
#include <Ethernet.h> /*comentario */
#include "DHT.h"      /*comentario */

/* Informacoes da Central instalada*/
String HARDINFO[] = {"1", "Placa Control Home", "Arduino Mega", "10101010", "ATIVO", "1.0"};

/* Configuracao da placa Ethernet*/
byte mac[] = {0x90, 0xA2, 0xDA, 0x0F, 0x09, 0xA7}; //physical mac address
byte ip[] = {192, 168, 0, 99};                     // ip in lan
byte gateway[] = {192, 168, 0, 1};                 // internet access via router
byte subnet[] = {255, 255, 255, 0};                //subnet mask

EthernetServer server(80); //server port

EthernetClient client;

String readString;

long previousMillis = 0; // Variável de controle do tempo
long tempo = 1000;       // Tempo em ms do intervalo a ser executado

/*Definicao dos pinos digitais 
*******************************/
int PIN_ANALOGIC_01 = A1; /*Reservado */
int PIN_ANALOGIC_02 = A2; /*comentario */
int PIN_ANALOGIC_03 = A3; /*comentario */
int PIN_ANALOGIC_04 = A4; /*comentario */
int PIN_ANALOGIC_05 = A5; /*comentario */
int PIN_ANALOGIC_06 = A6; /*comentario */
int PIN_ANALOGIC_07 = A7; /*comentario */
int PIN_ANALOGIC_08 = A8; /*comentario */

/*Definicao dos pinos digitais 
*******************************/
int PIN_DIGITAL_01 = 1; /*Reservado */
int PIN_DIGITAL_02 = 2; /*comentario */
int PIN_DIGITAL_03 = 3; /*comentario */
int PIN_DIGITAL_04 = 4; /*comentario */
int PIN_DIGITAL_05 = 5; /*comentario */
int PIN_DIGITAL_06 = 6; /*comentario */
int PIN_DIGITAL_07 = 7; /*comentario */
int PIN_DIGITAL_08 = 8; /*comentario */

/*Interruptores Disponiveis 
*******************************/

/*status dos interruptores; */
bool STATUS_IT1, STATUS_IT2, STATUS_IT3, STATUS_IT4, STATUS_IT5, STATUS_IT6, STATUS_IT7, STATUS_IT8;

/*Mapa dos interruptores;    */
bool
    IT1,  /*Interruptor Luz Central Varanda ativa pino 3*/
    IT2,  /*Interruptor  */
    IT3,  /*Interruptor  */
    IT4,  /*Interruptor  */
    IT5,  /*Interruptor  */
    IT6,  /*Interruptor  */
    IT7,  /*Interruptor  */
    IT8,  /*Interruptor  */
    IT9,  /*Interruptor  */
    IT10; /*Interruptor  */

/*Mapa dos Sensores de Temperatura e umidade */
float ST1, SU1; /*Varanda     */
float ST2, SU2; /*Disponivel  */
float ST3, SU3; /*Disponivel  */
float ST4, SU4; /*Disponivel  */
float ST5, SU5; /*Disponivel  */
float ST6, SU6; /*Disponivel  */
float ST7, SU7; /*Disponivel  */
float ST8, SU8; /*Disponivel  */

/*Definicao de pinos dos sensores de  Temperatura e umidade */
DHT SENSOR_TEMPERATURA_01(PIN_ANALOGIC_01, DHT11);
DHT SENSOR_TEMPERATURA_02(PIN_ANALOGIC_02, DHT11);
DHT SENSOR_TEMPERATURA_03(PIN_ANALOGIC_03, DHT11);
DHT SENSOR_TEMPERATURA_04(PIN_ANALOGIC_04, DHT11);
DHT SENSOR_TEMPERATURA_05(PIN_ANALOGIC_05, DHT11);
DHT SENSOR_TEMPERATURA_06(PIN_ANALOGIC_06, DHT11);
DHT SENSOR_TEMPERATURA_07(PIN_ANALOGIC_07, DHT11);
DHT SENSOR_TEMPERATURA_08(PIN_ANALOGIC_08, DHT11);

//Sensores Prensenca disponiveis
boolean SP1, SP2, SP3, SP4, SP5, SP6, SP7, SP8;
unsigned long SPT1, SPT2, SPT3, SPT4, SPT5, SPT6, SPT7, SPT8;

void setup()
{
    Serial.begin(9600);
    /*Inicia Ethernet com as configurações definidas*/
    Serial.println("Iniciando Ethernet");
    Ethernet.begin(mac, ip, gateway, subnet);

    Serial.println("Iniciando Servidor");
    server.begin();

    /*Atualiza informação do Hardware*/
    Serial.println("Registrando dados do Hardware");
    String data = "id_hardware=" + HARDINFO[0] + "&descricao=" + HARDINFO[1] + "&modelo=" + HARDINFO[2] + "&serial=" + HARDINFO[3] + "&status=" + HARDINFO[4] + "&versao=" + HARDINFO[5];
    if (client.connect("192.168.0.15", 80))
    {
        client.println("POST /automation2/app/componentes/registrahardware HTTP/1.1");
        client.println("Host: 192.168.0.15"); // SERVER ADDRESS HERE TOO
        client.println("Content-Type: application/x-www-form-urlencoded");
        client.print("Content-Length: ");
        client.println(data.length());
        client.println();
        client.print(data);
    }

    /*Definicao dos Pinos Digitais */
    Serial.println("Definindo pinos e tipos de entrada e saida");
    pinMode(PIN_DIGITAL_01, OUTPUT);       /*Reservado   */
    pinMode(PIN_DIGITAL_02, INPUT_PULLUP); /*comentario  */
    pinMode(PIN_DIGITAL_03, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_04, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_05, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_06, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_07, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_08, OUTPUT);       /*comentario  */

    Serial.println("Iniciando sensores temperatura");
    SENSOR_TEMPERATURA_01.begin();
    SENSOR_TEMPERATURA_02.begin();
    SENSOR_TEMPERATURA_03.begin();
    SENSOR_TEMPERATURA_04.begin();
    SENSOR_TEMPERATURA_05.begin();
    SENSOR_TEMPERATURA_06.begin();
    SENSOR_TEMPERATURA_07.begin();
    SENSOR_TEMPERATURA_08.begin();
}

void loop()
{
    /*Configuracao Interruptor  */
    STATUS_IT1 = digitalRead(PIN_DIGITAL_02);
    delay(400);
    if (STATUS_IT1 == 0)
    {
        digitalWrite(PIN_DIGITAL_03, IT1);
        IT1 = !IT1;
    }

    /*Atualiza dados dos sensores de temperatura  */
    unsigned long currentMillis = millis();
    ST1 = (SENSOR_TEMPERATURA_01.readTemperature());
    SU1 = (SENSOR_TEMPERATURA_01.readHumidity());
    ST2 = (SENSOR_TEMPERATURA_02.readTemperature());
    SU2 = (SENSOR_TEMPERATURA_02.readHumidity());
    ST3 = (SENSOR_TEMPERATURA_03.readTemperature());
    SU3 = (SENSOR_TEMPERATURA_03.readHumidity());
    ST4 = (SENSOR_TEMPERATURA_04.readTemperature());
    SU4 = (SENSOR_TEMPERATURA_04.readHumidity());
    ST5 = (SENSOR_TEMPERATURA_05.readTemperature());
    SU5 = (SENSOR_TEMPERATURA_05.readHumidity());
    ST6 = (SENSOR_TEMPERATURA_06.readTemperature());
    SU6 = (SENSOR_TEMPERATURA_06.readHumidity());
    ST7 = (SENSOR_TEMPERATURA_07.readTemperature());
    SU7 = (SENSOR_TEMPERATURA_07.readHumidity());
    ST8 = (SENSOR_TEMPERATURA_08.readTemperature());
    SU8 = (SENSOR_TEMPERATURA_08.readHumidity());

    if (digitalRead(PIN_DIGITAL_01) != SP1)
    {
        // Ocorreu mudanca na leitura
        SP1 = !SP1;
        SPT1 = millis();
    }

    /*Configuracao componente SP2  */
    if (digitalRead(PIN_DIGITAL_02) != SP2)
    {
        SP2 = !SP2;
        Serial.print("Arduino Estado: ");
        Serial.print(SP2);
        Serial.print("\tTempo anterior: ");
        Serial.println((millis() - SPT2) / 1000.00, 1);
        SPT2 = (millis() - SPT2) / 1000, 2;
    }

    /*Configuracao componente SP3  */
    if (digitalRead(PIN_DIGITAL_03) != SP3)
    {
        SP3 = !SP3;
        SPT3 = (millis() - SPT3) / 1000, 2;
    }
    /*Configuracao componente SP3  */
    if (digitalRead(PIN_DIGITAL_04) != SP4)
    {
        SP4 = !SP4;
        SPT4 = (millis() - SPT4) / 1000, 2;
    }
    /*Configuracao componente SP3  */
    if (digitalRead(PIN_DIGITAL_05) != SP5)
    {
        SP5 = !SP5;
        SPT5 = (millis() - SPT5) / 1000, 2;
    }
    /*Configuracao componente SP3  */
    if (digitalRead(PIN_DIGITAL_06) != SP6)
    {
        SP6 = !SP6;
        SPT6 = (millis() - SPT6) / 1000, 2;
    }
    /*Configuracao componente SP3  */
    if (digitalRead(PIN_DIGITAL_07) != SP7)
    {
        SP7 = !SP7;
        SPT7 = (millis() - SPT7) / 1000, 2;
    }
    /*Configuracao componente SP3  */
    if (digitalRead(PIN_DIGITAL_08) != SP8)
    {
        SP8 = !SP8;
        SPT8 = (millis() - SPT8) / 1000, 2;
    }

    //ler a cada segundo
    if (currentMillis - previousMillis > tempo)
    {
        previousMillis = currentMillis; // Salva o tempo atual
        /*Atualiza informação dos componentes*/
        String st1 = "ST1=ST1|" + String(ST1) + ";" + String(SU1);
        String st2 = "&ST2=ST2|" + String(ST2) + ";" + String(SU2);
        String st3 = "&ST3=ST3|" + String(ST3) + ";" + String(SU3);
        String st4 = "&ST4=ST4|" + String(ST4) + ";" + String(SU4);
        String st5 = "&ST5=ST5|" + String(ST5) + ";" + String(SU5);
        String st6 = "&ST6=ST6|" + String(ST6) + ";" + String(SU6);
        String st7 = "&ST7=ST7|" + String(ST7) + ";" + String(SU7);
        String st8 = "&ST8=ST8|" + String(ST8) + ";" + String(SU8);

        String sp1 = "&SP1=SP1|" + String(SP1) + ";" + String(SPT1);
        String sp2 = "&SP1=SP2|" + String(SP2) + ";" + String(SPT2);

        String data2 = st1 + st2 + st3 + st4 + st5 + st6 + st7 + st8 + sp1 + sp2;

        if (client.connect("192.168.0.15", 80))
        { // REPLACE WITH YOUR SERVER ADDRESS
            client.println("POST /automation2/app/componentes/recebedados HTTP/1.1");
            client.println("Host: 192.168.0.15"); // SERVER ADDRESS HERE TOO
            client.println("Content-Type: application/x-www-form-urlencoded");
            client.print("Content-Length: ");
            client.println(data2.length());
            client.println();
            client.print(data2);
        }
    }

    // Create a client connection
    EthernetClient client = server.available();
    if (client)
    {
        while (client.connected())
        {
            if (client.available())
            {
                char c = client.read();
                //read char by char HTTP request
                if (readString.length() < 100)
                {

                    //store characters to string
                    readString += c;
                    //Serial.print(c);
                }

                //if HTTP request has ended
                if (c == '\n')
                {
                    client.println("HTTP/1.1 200 OK"); //send new page
                    client.println("Content-Type: text/html");
                    client.println();

                    client.println("<html>");
                    client.println("<head>");
                    client.println("<title>RoboCore - Remote Automation</title>");
                    client.println("<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>");
                    client.println("<link rel='stylesheet' type='text/css' href='http://www.robocore.net/upload/projetos/RemoteAutomationV1.0.css' />");
                    client.println("<script type='text/javascript' src='http://www.robocore.net/upload/projetos/RemoteAutomationV1.0.js'></script>");
                    client.println("</head>");
                    client.println("<body>");
                    client.println("<div id='wrapper'>RoboCore Remote Automation V1.1");
                    client.print("<div id='rele'></div><div id='estado' style='visibility: hidden;'>");

                    client.println("</div>");
                    client.println("<div id='botao'></div>");
                    client.println("</div>");
                    client.println("<script>AlteraEstadoRele()</script>");
                    client.println("</body>");
                    client.println("</head>");

                    delay(1);

                    //stopping client
                    client.stop();

                    delay(1);
                    // stopping client
                    client.stop();
                }
            }
        }
    }
}