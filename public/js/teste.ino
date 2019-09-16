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
EthernetServer server(80);                         //server port
EthernetClient client;
String readString;

/*Variaveis de configuracao dos componentes*/
const float VelSom = 34000.0; /* Velocidade do Som em cm/s utilizada no componente ultrasonico */
long tempoAnterior = 0;       /* Variável de controle do tempo usada para definir o tempo anterior do envio das informacoes ao servidor*/
long tempoEnvio = 500;        /* Variável de controle do tempo usada para definir o tempo de envio das informações ao servidor*/

/*Definicao dos pinos digitais 
*******************************/
int PIN_ANALOGIC_A0 = 0;  /*Reservado */
int PIN_ANALOGIC_01 = 1;  /*Reservado */
int PIN_ANALOGIC_02 = 2;  /*Reservado */
int PIN_ANALOGIC_03 = 3;  /*Reservado */
int PIN_ANALOGIC_04 = 4;  /*Reservado */
int PIN_ANALOGIC_05 = 5;  /*Reservado */
int PIN_ANALOGIC_06 = 6;  /*Reservado */
int PIN_ANALOGIC_07 = 7;  /*Reservado */
int PIN_ANALOGIC_08 = 8;  /*Reservado */
int PIN_ANALOGIC_09 = 9;  /*Reservado */
int PIN_ANALOGIC_10 = 10; /*Reservado */
int PIN_ANALOGIC_11 = 11; /*Reservado */
int PIN_ANALOGIC_12 = 12; /*Reservado */
int PIN_ANALOGIC_13 = 13; /*Reservado */
int PIN_ANALOGIC_14 = 14; /*Reservado */
int PIN_ANALOGIC_15 = 15; /*Reservado */

/*Definicao dos pinos digitais 
*******************************/
int PIN_DIGITAL_00 = 0;
String PIN_DIGITAL_00_SAIDA = "OUTPUT"; /*Reservado */
int PIN_DIGITAL_01 = 1;
String PIN_DIGITAL_01_SAIDA = "OUTPUT"; /*Reservado */
int PIN_DIGITAL_02 = 2;
String PIN_DIGITAL_02_SAIDA = "INPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_03 = 3;
String PIN_DIGITAL_03_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_04 = 4;
String PIN_DIGITAL_04_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_05 = 5;
String PIN_DIGITAL_05_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_06 = 6;
String PIN_DIGITAL_06_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_07 = 7;
String PIN_DIGITAL_07_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_08 = 8;
String PIN_DIGITAL_08_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_09 = 9;
String PIN_DIGITAL_09_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_10 = 10;
String PIN_DIGITAL_10_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_11 = 11;
String PIN_DIGITAL_11_SAIDA = "OUTPUT"; /*instalado sensor de temperatura */
int PIN_DIGITAL_12 = 12;
String PIN_DIGITAL_12_SAIDA = "OUTPUT"; /*reservado */
int PIN_DIGITAL_13 = 13;
String PIN_DIGITAL_13_SAIDA = "OUTPUT"; /*reservado */
int PIN_DIGITAL_14 = 14;
String PIN_DIGITAL_14_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_15 = 15;
String PIN_DIGITAL_15_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_16 = 16;
String PIN_DIGITAL_16_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_17 = 17;
String PIN_DIGITAL_17_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_18 = 18;
String PIN_DIGITAL_18_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_19 = 19;
String PIN_DIGITAL_19_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_20 = 20;
String PIN_DIGITAL_20_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_21 = 21;
String PIN_DIGITAL_21_SAIDA = "OUTPUT"; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_22 = 22;
String PIN_DIGITAL_22_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_23 = 23;
String PIN_DIGITAL_23_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_24 = 24;
String PIN_DIGITAL_24_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_25 = 25;
String PIN_DIGITAL_25_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_26 = 26;
String PIN_DIGITAL_26_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_27 = 27;
String PIN_DIGITAL_27_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_28 = 28;
String PIN_DIGITAL_28_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_29 = 29;
String PIN_DIGITAL_29_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_30 = 30;
String PIN_DIGITAL_30_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_31 = 31;
String PIN_DIGITAL_31_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_32 = 32;
String PIN_DIGITAL_32_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_33 = 33;
String PIN_DIGITAL_33_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_34 = 34;
String PIN_DIGITAL_34_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_35 = 35;
String PIN_DIGITAL_35_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_36 = 36;
String PIN_DIGITAL_36_SAIDA = "OUTPUT"; /*instalado sensor de presenca */
int PIN_DIGITAL_37 = 37;
String PIN_DIGITAL_37_SAIDA = "OUTPUT"; /*Reservado */
int PIN_DIGITAL_38 = 38;
String PIN_DIGITAL_38_SAIDA = "OUTPUT"; /*Reservado */
int PIN_DIGITAL_39 = 39;
String PIN_DIGITAL_39_SAIDA = "OUTPUT"; /*Reservado */
int PIN_DIGITAL_40 = 40;
String PIN_DIGITAL_40_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_41 = 42;
String PIN_DIGITAL_41_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_42 = 42;
String PIN_DIGITAL_42_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_43 = 43;
String PIN_DIGITAL_43_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_44 = 44;
String PIN_DIGITAL_44_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_45 = 45;
String PIN_DIGITAL_45_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_46 = 46;
String PIN_DIGITAL_46_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_47 = 47;
String PIN_DIGITAL_47_SAIDA = "OUTPUT"; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_48 = 48;
String PIN_DIGITAL_48_SAIDA = "OUTPUT"; /*reservado */
int PIN_DIGITAL_49 = 49;
String PIN_DIGITAL_49_SAIDA = "OUTPUT"; /*reservado */
int PIN_DIGITAL_50 = 50;
String PIN_DIGITAL_50_SAIDA = "OUTPUT"; /*reservado */
int PIN_DIGITAL_51 = 51;
String PIN_DIGITAL_51_SAIDA = "OUTPUT"; /*reservado */
int PIN_DIGITAL_52 = 52;
String PIN_DIGITAL_52_SAIDA = "OUTPUT"; /*reservado */

/*Mapa dos componentes*/
float C01, C01_PARAM; /*instalado sensor de temperatura  */
float C02, C02_PARAM; /*instalado sensor de temperatura  */
float C03, C03_PARAM; /*instalado sensor de temperatura  */
float C04, C04_PARAM; /*instalado sensor de temperatura  */
float C05, C05_PARAM; /*instalado sensor de temperatura  */
float C06, C06_PARAM; /*instalado sensor de temperatura  */
float C07, C07_PARAM; /*instalado sensor de temperatura  */
float C08, C08_PARAM; /*instalado sensor de temperatura  */
float C09, C09_PARAM; /*instalado sensor de temperatura  */
float C10, C10_PARAM; /*instalado sensor de temperatura  */
float C11, C11_PARAM; /*Reservado  */
float C12, C12_PARAM; /*Reservado  */
float C13, C13_PARAM; /*Reservado  */
boolean C14;
unsigned long C14_PARAM; /*instalado sensor de presenca  */
boolean C15;
unsigned long C15_PARAM; /*instalado sensor de presenca  */
boolean C16;
unsigned long C16_PARAM; /*instalado sensor de presenca  */
boolean C17;
unsigned long C17_PARAM; /*instalado sensor de presenca  */
boolean C18;
unsigned long C18_PARAM; /*instalado sensor de presenca  */
boolean C19;
unsigned long C19_PARAM; /*instalado sensor de presenca  */
boolean C20;
unsigned long C20_PARAM; /*instalado sensor de presenca  */
boolean C21;
unsigned long C21_PARAM; /*instalado sensor de presenca  */
boolean C22;
unsigned long C22_PARAM; /*instalado sensor de presenca  */
boolean C23;
unsigned long C23_PARAM; /*instalado sensor de presenca  */
boolean C24;
unsigned long C24_PARAM; /*instalado sensor de presenca  */
boolean C25;
unsigned long C25_PARAM; /*instalado sensor de presenca  */
boolean C26;
unsigned long C26_PARAM; /*instalado sensor de presenca  */
boolean C27;
unsigned long C27_PARAM; /*instalado sensor de presenca  */
boolean C28;
unsigned long C28_PARAM; /*instalado sensor de presenca  */
boolean C29;
unsigned long C29_PARAM; /*Reservado  */
boolean C30;
unsigned long C30_PARAM; /*Reservado  */
boolean C31;
unsigned long C31_PARAM; /*Reservado  */
boolean C32;
unsigned long C32_PARAM; /*Reservado  */
boolean C33;
unsigned long C33_PARAM; /*Reservado  */
float C34, C34_PARAM;    /*Instalado Reservatorio 1*/
float C35, C35_PARAM;    /*Instalado Reservatorio 2*/
float C36, C36_PARAM;    /*Reservado  */
float C37, C37_PARAM;    /*Reservado  */

/*Definicao de pinos dos sensores de  Temperatura e umidade */
DHT SENSOR_TEMPERATURA_01(PIN_DIGITAL_02, DHT11);
DHT SENSOR_TEMPERATURA_02(PIN_DIGITAL_03, DHT11);
DHT SENSOR_TEMPERATURA_03(PIN_DIGITAL_04, DHT11);
DHT SENSOR_TEMPERATURA_04(PIN_DIGITAL_05, DHT11);
DHT SENSOR_TEMPERATURA_05(PIN_DIGITAL_06, DHT11);
DHT SENSOR_TEMPERATURA_06(PIN_DIGITAL_07, DHT11);
DHT SENSOR_TEMPERATURA_07(PIN_DIGITAL_08, DHT11);
DHT SENSOR_TEMPERATURA_08(PIN_DIGITAL_09, DHT11);
DHT SENSOR_TEMPERATURA_09(PIN_DIGITAL_10, DHT11);
DHT SENSOR_TEMPERATURA_10(PIN_DIGITAL_11, DHT11);
void setup()
{

    Serial.begin(9600);
    /*Inicia Ethernet com as configurações definidas*/
    Serial.println("Iniciando Ethernet");
    Ethernet.begin(mac, ip, gateway, subnet);

    Serial.println("Iniciando Servidor");
    server.begin();

    /*Definicao dos Pinos Analogicos */
    Serial.println("Definindo pinos e tipos de entrada e saida Analogicos");
    pinMode(PIN_ANALOGIC_A0, OUTPUT); /*Reservado   */

    /*Definicao dos Pinos Digitais */
    Serial.println("Definindo pinos e tipos de entrada e saida Digitais");
    pinMode(PIN_DIGITAL_00, OUTPUT); /*Reservado   */
    pinMode(PIN_DIGITAL_01, OUTPUT); /*Reservado   */
    pinMode(PIN_DIGITAL_02, OUTPUT); /*comentario  */
    pinMode(PIN_DIGITAL_03, OUTPUT); /*comentario  */
    pinMode(PIN_DIGITAL_04, OUTPUT); /*comentario  */
    pinMode(PIN_DIGITAL_05, OUTPUT); /*comentario  */
    pinMode(PIN_DIGITAL_06, INPUT);  /*comentario  */
    pinMode(PIN_DIGITAL_07, OUTPUT); /*comentario  */
    pinMode(PIN_DIGITAL_08, OUTPUT); /*comentario  */

    /*Atualiza informação do Hardware*/
    Serial.println("Registrando dados do Hardware");
    String data = "id_hardware=" + HARDINFO[0] + "&descricao=" + HARDINFO[1] + "&modelo=" + HARDINFO[2] + "&serial=" + HARDINFO[3] + "&status=" + HARDINFO[4] + "&versao=" + HARDINFO[5];
    if (client.connect("192.168.0.100", 80))
    {
        client.println("POST /automation2/app/componentes/registrahardware HTTP/1.1");
        client.println("Host: 192.168.0.100"); // SERVER ADDRESS HERE TOO
        client.println("Content-Type: application/x-www-form-urlencoded");
        client.print("Content-Length: ");
        client.println(data.length());
        client.println();
        client.print(data);
    }

    /*Inicia Sensores de Temperatura instalados*/
    Serial.println("Iniciando sensores temperatura");
    SENSOR_TEMPERATURA_01.begin();
    SENSOR_TEMPERATURA_02.begin();
    SENSOR_TEMPERATURA_03.begin();
    //    SENSOR_TEMPERATURA_04.begin();
    //    SENSOR_TEMPERATURA_05.begin();
    //    SENSOR_TEMPERATURA_06.begin();
    //    SENSOR_TEMPERATURA_07.begin();
    //    SENSOR_TEMPERATURA_08.begin();
    //    SENSOR_TEMPERATURA_09.begin();
    //    SENSOR_TEMPERATURA_10.begin();
}

void loop()
{

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
                    client.println("N");
                    //         //interruptor
                    //          if(readString.indexOf("IT1/1") >0)
                    //          {
                    //            digitalWrite(PIN_DIGITAL_04, HIGH);
                    //            STATUS_IT1 = false;
                    //             IT1 = 0;
                    //
                    //              client.println("ON");
                    //          }
                    //          else{
                    //            if(readString.indexOf("IT1/0") >0)
                    //            {
                    //              digitalWrite(PIN_DIGITAL_04, LOW);
                    //              STATUS_IT1 = true;
                    //              IT1 = 1;
                    //              client.println("OFF");
                    //            }
                    //          }
                    //
                    readString = "";

                    ///////////////

                    client.println("HTTP/1.1 200 OK"); //send new page
                    client.println("Access-Control-Allow-Origin: 192.168.0.15");
                    client.println("Content-Type: text/html");
                    client.println("Connection: keep-alive");
                    client.println("Allow: GET,HEAD,POST,OPTIONS,TRACE");
                    client.println();
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

                    client.println("</body>");
                    client.println("</head>");

                    delay(1);
                    //stopping client
                    client.stop();
                }
            }
        }
    }

    /*Atualiza Nivel Agua caixa 01  */
    iniciarTrigger();
    unsigned long tiempo = pulseIn(PIN_DIGITAL_40, HIGH);
    C34 = tiempo * 0.000001 * VelSom / 2.0;

    /*Atualiza dados dos sensores de temperatura  */
    unsigned long currentMillis = millis();
    if (isnan(SENSOR_TEMPERATURA_01.readTemperature()) || isnan(SENSOR_TEMPERATURA_01.readHumidity()))
    {
        C01 = 0;
        C01_PARAM = 0;
    }
    else
    {
        C01 = (SENSOR_TEMPERATURA_01.readTemperature());
        C01_PARAM = (SENSOR_TEMPERATURA_01.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_02.readTemperature()) || isnan(SENSOR_TEMPERATURA_02.readHumidity()))
    {
        C02 = 0;
        C02_PARAM = 0;
    }
    else
    {
        C02 = (SENSOR_TEMPERATURA_02.readTemperature());
        C02_PARAM = (SENSOR_TEMPERATURA_02.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_03.readTemperature()) || isnan(SENSOR_TEMPERATURA_03.readHumidity()))
    {
        C03 = 0;
        C03_PARAM = 0;
    }
    else
    {
        C03 = (SENSOR_TEMPERATURA_03.readTemperature());
        C03_PARAM = (SENSOR_TEMPERATURA_03.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_04.readTemperature()) || isnan(SENSOR_TEMPERATURA_04.readHumidity()))
    {
        C04 = 0;
        C04_PARAM = 0;
    }
    else
    {
        C04 = (SENSOR_TEMPERATURA_04.readTemperature());
        C04_PARAM = (SENSOR_TEMPERATURA_04.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_05.readTemperature()) || isnan(SENSOR_TEMPERATURA_05.readHumidity()))
    {
        C05 = 0;
        C05_PARAM = 0;
    }
    else
    {
        C05 = (SENSOR_TEMPERATURA_05.readTemperature());
        C05_PARAM = (SENSOR_TEMPERATURA_05.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_06.readTemperature()) || isnan(SENSOR_TEMPERATURA_06.readHumidity()))
    {
        C06 = 0;
        C06_PARAM = 0;
    }
    else
    {
        C06 = (SENSOR_TEMPERATURA_06.readTemperature());
        C06_PARAM = (SENSOR_TEMPERATURA_06.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_07.readTemperature()) || isnan(SENSOR_TEMPERATURA_07.readHumidity()))
    {
        C07 = 0;
        C07_PARAM = 0;
    }
    else
    {
        C07 = (SENSOR_TEMPERATURA_07.readTemperature());
        C07_PARAM = (SENSOR_TEMPERATURA_07.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_08.readTemperature()) || isnan(SENSOR_TEMPERATURA_08.readHumidity()))
    {
        C08 = 0;
        C08_PARAM = 0;
    }
    else
    {
        C08 = (SENSOR_TEMPERATURA_08.readTemperature());
        C08_PARAM = (SENSOR_TEMPERATURA_08.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_09.readTemperature()) || isnan(SENSOR_TEMPERATURA_09.readHumidity()))
    {
        C09 = 0;
        C09_PARAM = 0;
    }
    else
    {
        C09 = (SENSOR_TEMPERATURA_09.readTemperature());
        C09_PARAM = (SENSOR_TEMPERATURA_09.readHumidity());
    }

    if (isnan(SENSOR_TEMPERATURA_10.readTemperature()) || isnan(SENSOR_TEMPERATURA_10.readHumidity()))
    {
        C10 = 0;
        C10_PARAM = 0;
    }
    else
    {
        C10 = (SENSOR_TEMPERATURA_10.readTemperature());
        C10_PARAM = (SENSOR_TEMPERATURA_10.readHumidity());
    }

    Serial.println(C01);

    /*Configuracao sensor presenca  */
    if (digitalRead(PIN_DIGITAL_22) != C14)
    {
        C14 = !C14;
        Serial.println("Estado: " + C14);
        Serial.println("Tempo anterior: " + ((millis() - C14_PARAM) / 1000.00, 1));
        C14_PARAM = (millis() - C14_PARAM) / 1000, 2;
    }

    //ler a cada segundo
    if (currentMillis - tempoAnterior > tempoEnvio)
    {
        tempoAnterior = currentMillis; // Salva o tempo atual
        /*Atualiza informação dos componentes*/
        String c01 = "C01=C01|" + String(C01) + ";" + String(C01_PARAM);
        String c02 = "&C02=C02|" + String(C02) + ";" + String(C02_PARAM);
        String c03 = "&C03=C03|" + String(C03) + ";" + String(C03_PARAM);
        String c04 = "&C04=C04|" + String(C04) + ";" + String(C04_PARAM);
        String c05 = "&C05=C05|" + String(C05) + ";" + String(C05_PARAM);
        String c06 = "&C06=C06|" + String(C06) + ";" + String(C06_PARAM);
        String c07 = "&C07=C07|" + String(C07) + ";" + String(C07_PARAM);
        String c08 = "&C08=C08|" + String(C08) + ";" + String(C08_PARAM);
        String c09 = "&C09=C09|" + String(C09) + ";" + String(C09_PARAM);
        String c10 = "&C10=C10|" + String(C10) + ";" + String(C10_PARAM);

        String data2 = c01 + c02 + c03 + c04 + c05 + c06 + c07 + c08 + c09 + c10;
        Serial.println("data2: " + String(data2));
        if (client.connect("192.168.0.100", 80))
        { // REPLACE WITH YOUR SERVER ADDRESS
            client.println("POST /automation2/app/componentes/recebedados HTTP/1.1");
            client.println("Host: 192.168.0.100"); // SERVER ADDRESS HERE TOO
            client.println("Content-Type: application/x-www-form-urlencoded");
            client.print("Content-Length: ");
            client.println(data2.length());
            client.println();
            client.print(data2);
        }
    }
}

void readDHT(DHT dht, String s)
{
    // Efetua a leitura e exibe dados
    float h = dht.readHumidity();    // Umidade
    float c = dht.readTemperature(); // Temperatura em Celsius

    // Verifica se houve erro na leitura
    if (isnan(h) || isnan(c))
    {
        Serial.println("*** Erro na leitura ***");
        return;
    }

    // Exibicao
    Serial.print(s + " U: ");
    Serial.print(h, 1);
    Serial.print("% T: ");
    Serial.print(c, 1);
    Serial.print("°C ");

    Serial.print("°F ST: ");
    Serial.print(dht.computeHeatIndex(c, h, false), 1);
    Serial.print("°C  ");
}
// Método que inicia la secuencia del Trigger para comenzar a medir
void iniciarTrigger()
{
    // Ponemos el Triiger en estado bajo y esperamos 2 ms
    digitalWrite(PIN_DIGITAL_41, LOW);
    delayMicroseconds(2);

    // Ponemos el pin Trigger a estado alto y esperamos 10 ms
    digitalWrite(PIN_DIGITAL_41, HIGH);
    delayMicroseconds(10);

    // Comenzamos poniendo el pin Trigger en estado bajo
    digitalWrite(PIN_DIGITAL_41, LOW);
}