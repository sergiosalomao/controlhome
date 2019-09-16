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
long tempoEnvio = 1000;       /* Variável de controle do tempo usada para definir o tempo de envio das informações ao servidor*/

/*Definicao dos pinos digitais 
*******************************/

#define PIN_ANALOGIC_A0  A0  /*Reservado */
#define PIN_ANALOGIC_01  A1;  /*Reservado */
#define PIN_ANALOGIC_02  A2;  /*Reservado */
#define PIN_ANALOGIC_03  A3;  /*Reservado */
#define PIN_ANALOGIC_04  A4;  /*Reservado */
#define PIN_ANALOGIC_05  A5;  /*Reservado */
#define PIN_ANALOGIC_06  A6;  /*Reservado */
#define PIN_ANALOGIC_07  A7;  /*Reservado */
#define PIN_ANALOGIC_08  A8;  /*Reservado */
#define PIN_ANALOGIC_09  A9;  /*Reservado */
#define PIN_ANALOGIC_10  A10; /*Reservado */
#define PIN_ANALOGIC_11  A11; /*Reservado */
#define PIN_ANALOGIC_12  A12; /*Reservado */
#define PIN_ANALOGIC_13  A13; /*Reservado */
#define PIN_ANALOGIC_14  A14; /*Reservado */
#define PIN_ANALOGIC_15  A15; /*Reservado */

/*Definicao dos pinos digitais 
*******************************/
int PIN_DIGITAL_00 = 0;
char PIN_DIGITAL_00_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_01 = 1;
char PIN_DIGITAL_01_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_02 = 2;
char PIN_DIGITAL_02_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_03 = 3;
char PIN_DIGITAL_03_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_04 = 4;
char PIN_DIGITAL_04_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_05 = 5;
char PIN_DIGITAL_05_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_06 = 6;
char PIN_DIGITAL_06_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_07 = 7;
char PIN_DIGITAL_07_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_08 = 8;
char PIN_DIGITAL_08_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_09 = 9;
char PIN_DIGITAL_09_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_10 = 10;
char PIN_DIGITAL_10_SAIDA = OUTPUT; /*reservado */
int PIN_DIGITAL_11 = 11;
char PIN_DIGITAL_11_SAIDA = OUTPUT; /*reservado */
int PIN_DIGITAL_12 = 12;
char PIN_DIGITAL_12_SAIDA = OUTPUT; /*reservado */
int PIN_DIGITAL_13 = 13;
char PIN_DIGITAL_13_SAIDA = OUTPUT; /*reservado */
int PIN_DIGITAL_14 = 14;
char PIN_DIGITAL_14_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_15 = 15;
char PIN_DIGITAL_15_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_16 = 16;
char PIN_DIGITAL_16_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_17 = 17;
char PIN_DIGITAL_17_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_18 = 18;
char PIN_DIGITAL_18_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_19 = 19;
char PIN_DIGITAL_19_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_20 = 20;
char PIN_DIGITAL_20_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_21 = 21;
char PIN_DIGITAL_21_SAIDA = OUTPUT; /*reservado para portas de comunicacao*/
int PIN_DIGITAL_22 = 22;
char PIN_DIGITAL_22_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_23 = 23;
char PIN_DIGITAL_23_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_24 = 24;
char PIN_DIGITAL_24_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_25 = 25;
char PIN_DIGITAL_25_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_26 = 26;
char PIN_DIGITAL_26_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_27 = 27;
char PIN_DIGITAL_27_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_28 = 28;
char PIN_DIGITAL_28_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_29 = 29;
char PIN_DIGITAL_29_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_30 = 30;
char PIN_DIGITAL_30_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_31 = 31;
char PIN_DIGITAL_31_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_32 = 32;
char PIN_DIGITAL_32_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_33 = 33;
char PIN_DIGITAL_33_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_34 = 34;
char PIN_DIGITAL_34_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_35 = 35;
char PIN_DIGITAL_35_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_36 = 36;
char PIN_DIGITAL_36_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_37 = 37;
char PIN_DIGITAL_37_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_38 = 38;
char PIN_DIGITAL_38_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_39 = 39;
char PIN_DIGITAL_39_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_40 = 40;
char PIN_DIGITAL_40_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_41 = 41;
char PIN_DIGITAL_41_SAIDA = INPUT; /*instalado sensor de presenca */
int PIN_DIGITAL_42 = 42;
char PIN_DIGITAL_42_SAIDA = INPUT; /*Reservado */
int PIN_DIGITAL_43 = 43;
char PIN_DIGITAL_43_SAIDA = INPUT; /*Reservado */
int PIN_DIGITAL_44 = 44;
char PIN_DIGITAL_44_SAIDA = INPUT; /*Reservado */
int PIN_DIGITAL_45 = 45;
char PIN_DIGITAL_45_SAIDA = INPUT; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_46 = 46;
char PIN_DIGITAL_46_SAIDA = OUTPUT; /*instalado sensor de nivel dagua */
int PIN_DIGITAL_47 = 47;
char PIN_DIGITAL_47_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_48 = 48;
char PIN_DIGITAL_48_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_49 = 49;
char PIN_DIGITAL_49_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_50 = 50;
char PIN_DIGITAL_50_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_51 = 51;
char PIN_DIGITAL_51_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_52 = 52;
char PIN_DIGITAL_52_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_53 = 53;
char PIN_DIGITAL_53_SAIDA = OUTPUT; /*Reservado */

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
float C14, C14_PARAM; /*reservado para portas de comunicacao*/
float C15, C15_PARAM; /*reservado para portas de comunicacao*/
float C16, C16_PARAM; /*reservado para portas de comunicacao*/
float C17, C17_PARAM; /*reservado para portas de comunicacao*/
float C18, C18_PARAM; /*reservado para portas de comunicacao*/
float C19, C19_PARAM; /*reservado para portas de comunicacao*/
float C20, C20_PARAM; /*reservado para portas de comunicacao*/
float C21, C21_PARAM; /*reservado para portas de comunicacao*/
float C22, C22_PARAM; /*instalado sensor de temperatura  */
float C23, C23_PARAM; /*instalado sensor de temperatura  */
float C24, C24_PARAM; /*Reservado  */
float C25, C25_PARAM; /*Reservado  */
float C26, C26_PARAM; /*Reservado  */
float C27, C27_PARAM; /*instalado sensor de presenca  */
float C28, C28_PARAM; /*instalado sensor de presenca  */
float C29, C29_PARAM; /*instalado sensor de presenca  */
float C30, C30_PARAM; /*instalado sensor de presenca  */
float C31, C31_PARAM; /*instalado sensor de presenca  */
float C32, C32_PARAM; /*instalado sensor de presenca  */
float C33, C33_PARAM; /*instalado sensor de presenca  */
float C34, C34_PARAM; /*instalado sensor de presenca  */
float C35, C35_PARAM; /*instalado sensor de presenca  */
float C36, C36_PARAM; /*instalado sensor de presenca  */
float C37, C37_PARAM; /*instalado sensor de presenca  */
float C38, C38_PARAM; /*instalado sensor de presenca  */
float C39, C39_PARAM; /*instalado sensor de presenca  */
float C40, C40_PARAM; /*instalado sensor de presenca  */
float C41, C41_PARAM; /*instalado sensor de presenca  */
float C42, C42_PARAM; /*Reservado  */
float C43, C43_PARAM; /*Reservado  */
float C44, C44_PARAM; /*Reservado  */
float C45, C45_PARAM; /*Reservado  */
float C46, C46_PARAM; /*instalado sensor nivel agua  */
float C47, C47_PARAM; /*instalado sensor nivel agua  */
float C48, C48_PARAM; /*Reservado  */
float C49, C49_PARAM; /*Reservado  */
float C50, C50_PARAM; /*Reservado  */
float C51, C51_PARAM; /*Reservado  */
float C52, C52_PARAM; /*Reservado  */
float C53, C53_PARAM; /*Reservado  */

/*Definicao de pinos dos sensores de  Temperatura e umidade */
DHT SENSOR_TEMPERATURA_01(PIN_DIGITAL_02, DHT11);
DHT SENSOR_TEMPERATURA_02(PIN_DIGITAL_03, DHT11);
DHT SENSOR_TEMPERATURA_03(PIN_DIGITAL_04, DHT11);
DHT SENSOR_TEMPERATURA_04(PIN_DIGITAL_05, DHT11);
DHT SENSOR_TEMPERATURA_05(PIN_DIGITAL_06, DHT11);
DHT SENSOR_TEMPERATURA_06(PIN_DIGITAL_07, DHT11);
DHT SENSOR_TEMPERATURA_07(PIN_DIGITAL_08, DHT11);
DHT SENSOR_TEMPERATURA_08(PIN_DIGITAL_09, DHT11);
DHT SENSOR_TEMPERATURA_09(PIN_DIGITAL_22, DHT11);
DHT SENSOR_TEMPERATURA_10(PIN_DIGITAL_23, DHT11);

void setup()
{
    Serial.println("Iniciando...");

    /*Dafine taxa de transmissao*/
    Serial.println("Taxa de transmissao: 9600");
    Serial.begin(9600);

    /*Inicia Ethernet com as configurações definidas*/
    Serial.println("Iniciando Ethernet");
    Ethernet.begin(mac, ip, gateway, subnet);

    Serial.println("Iniciando Servidor");
    server.begin();

    /*Definicao dos Pinos Analogicos */
    Serial.println("Definindo pinos e tipos de entrada e saida Analogicos");
    pinMode(PIN_ANALOGIC_A0, OUTPUT); /*Reservado   */
    pinMode(PIN_ANALOGIC_A0, OUTPUT); /*Reservado   */
    pinMode(PIN_ANALOGIC_A0, OUTPUT); /*Reservado   */
    pinMode(PIN_ANALOGIC_A0, OUTPUT); /*Reservado   */

    /*Definicao dos Pinos Digitais */
    Serial.println("Definindo pinos e tipos de entrada e saida Digitais");
    pinMode(PIN_DIGITAL_00, PIN_DIGITAL_00_SAIDA); /*Reservado   */
    pinMode(PIN_DIGITAL_01, PIN_DIGITAL_01_SAIDA); /*Reservado   */
    pinMode(PIN_DIGITAL_02, PIN_DIGITAL_02_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_03, PIN_DIGITAL_03_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_04, PIN_DIGITAL_04_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_05, PIN_DIGITAL_05_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_06, PIN_DIGITAL_06_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_07, PIN_DIGITAL_07_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_08, PIN_DIGITAL_08_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_09, PIN_DIGITAL_09_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_10, PIN_DIGITAL_10_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_11, PIN_DIGITAL_11_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_12, PIN_DIGITAL_12_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_13, PIN_DIGITAL_13_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_14, PIN_DIGITAL_14_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_15, PIN_DIGITAL_15_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_16, PIN_DIGITAL_16_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_17, PIN_DIGITAL_17_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_18, PIN_DIGITAL_18_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_19, PIN_DIGITAL_19_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_20, PIN_DIGITAL_20_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_21, PIN_DIGITAL_21_SAIDA); /*reservado para portas de comunicacao*/
    pinMode(PIN_DIGITAL_22, PIN_DIGITAL_22_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_23, PIN_DIGITAL_23_SAIDA); /*instalado sensor temperatura  */
    pinMode(PIN_DIGITAL_24, PIN_DIGITAL_24_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_25, PIN_DIGITAL_25_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_26, PIN_DIGITAL_26_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_27, PIN_DIGITAL_27_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_28, PIN_DIGITAL_28_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_29, PIN_DIGITAL_29_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_30, PIN_DIGITAL_30_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_31, PIN_DIGITAL_31_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_32, PIN_DIGITAL_32_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_33, PIN_DIGITAL_33_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_34, PIN_DIGITAL_34_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_35, PIN_DIGITAL_35_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_36, PIN_DIGITAL_36_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_37, PIN_DIGITAL_37_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_38, PIN_DIGITAL_38_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_39, PIN_DIGITAL_39_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_40, PIN_DIGITAL_40_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_41, PIN_DIGITAL_41_SAIDA); /*instalado sensor de presenca  */
    pinMode(PIN_DIGITAL_42, PIN_DIGITAL_42_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_43, PIN_DIGITAL_43_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_44, PIN_DIGITAL_44_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_45, PIN_DIGITAL_45_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_46, PIN_DIGITAL_46_SAIDA); /*instalado sensor de nivel dagua */
    pinMode(PIN_DIGITAL_47, PIN_DIGITAL_47_SAIDA); /*instalado sensor de nivel dagua */
    pinMode(PIN_DIGITAL_48, PIN_DIGITAL_48_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_49, PIN_DIGITAL_49_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_50, PIN_DIGITAL_50_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_51, PIN_DIGITAL_51_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_52, PIN_DIGITAL_52_SAIDA); /*Reservado  */
    pinMode(PIN_DIGITAL_53, PIN_DIGITAL_53_SAIDA); /*Reservado  */

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
    SENSOR_TEMPERATURA_04.begin();
    SENSOR_TEMPERATURA_05.begin();
    SENSOR_TEMPERATURA_06.begin();
    SENSOR_TEMPERATURA_07.begin();
    SENSOR_TEMPERATURA_08.begin();
    SENSOR_TEMPERATURA_09.begin();
    SENSOR_TEMPERATURA_10.begin();
}

void loop()
{

    //    // Create a client connection
    //    EthernetClient client = server.available();
    //    if (client)
    //    {
    //        while (client.connected())
    //        {
    //            if (client.available())
    //            {
    //                char c = client.read();
    //
    //                //read char by char HTTP request
    //                if (readString.length() < 100)
    //                {
    //
    //                    //store characters to string
    //                    readString += c;
    //                    //Serial.print(c);
    //                }
    //
    //                //if HTTP request has ended
    //                if (c == '\n')
    //                {
    //                    client.println("N");
    //                    //         //interruptor
    //                    //          if(readString.indexOf("IT1/1") >0)
    //                    //          {
    //                    //            digitalWrite(PIN_DIGITAL_04, HIGH);
    //                    //            STATUS_IT1 = false;
    //                    //             IT1 = 0;
    //                    //
    //                    //              client.println("ON");
    //                    //          }
    //                    //          else{
    //                    //            if(readString.indexOf("IT1/0") >0)
    //                    //            {
    //                    //              digitalWrite(PIN_DIGITAL_04, LOW);
    //                    //              STATUS_IT1 = true;
    //                    //              IT1 = 1;
    //                    //              client.println("OFF");
    //                    //            }
    //                    //          }
    //                    //
    //                    readString = "";
    //
    //                    ///////////////
    //
    //                    client.println("HTTP/1.1 200 OK"); //send new page
    //                    client.println("Access-Control-Allow-Origin: 192.168.0.100");
    //                    client.println("Content-Type: text/html");
    //                    client.println("Connection: keep-alive");
    //                    client.println("Allow: GET,HEAD,POST,OPTIONS,TRACE");
    //                    client.println();
    //                    client.println();
    //
    //                    client.println("<html>");
    //                    client.println("<head>");
    //                    client.println("<title>RoboCore - Remote Automation</title>");
    //                    client.println("<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>");
    //                    client.println("<link rel='stylesheet' type='text/css' href='http://www.robocore.net/upload/projetos/RemoteAutomationV1.0.css' />");
    //                    client.println("<script type='text/javascript' src='http://www.robocore.net/upload/projetos/RemoteAutomationV1.0.js'></script>");
    //                    client.println("</head>");
    //                    client.println("<body>");
    //                    client.println("<div id='wrapper'>RoboCore Remote Automation V1.1");
    //                    client.print("<div id='rele'></div><div id='estado' style='visibility: hidden;'>");
    //
    //                    client.println("</div>");
    //                    client.println("<div id='botao'></div>");
    //                    client.println("</div>");
    //
    //                    client.println("</body>");
    //                    client.println("</head>");
    //
    //                    delay(1);
    //                    //stopping client
    //                    client.stop();
    //                }
    //            }
    //        }
    //    }

    /*Atualiza Nivel Agua caixa 01  */
        iniciarTrigger();
        unsigned long tiempo = pulseIn(PIN_DIGITAL_45, HIGH);
        C45 = tiempo * 0.000001 * VelSom / 2.0;
       
        
 Serial.print(C45);
    Serial.print("cm");
Serial.println();
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

    /*Configuracao sensor presenca  */
    if (digitalRead(PIN_DIGITAL_27) == 1)
        C27 = 1;
    else
        C27 = 0;
    if (digitalRead(PIN_DIGITAL_28) == 1)
        C28 = 1;
    else
        C28 = 0;
    if (digitalRead(PIN_DIGITAL_29) == 1)
        C29 = 1;
    else
        C29 = 0;
    if (digitalRead(PIN_DIGITAL_30) == 1)
        C30 = 1;
    else
        C30 = 0;
    if (digitalRead(PIN_DIGITAL_31) == 1)
        C31 = 1;
    else
        C31 = 0;
    if (digitalRead(PIN_DIGITAL_32) == 1)
        C32 = 1;
    else
        C32 = 0;
    if (digitalRead(PIN_DIGITAL_33) == 1)
        C33 = 1;
    else
        C33 = 0;
    if (digitalRead(PIN_DIGITAL_34) == 1)
        C34 = 1;
    else
        C34 = 0;
    if (digitalRead(PIN_DIGITAL_35) == 1)
        C35 = 1;
    else
        C35 = 0;
    if (digitalRead(PIN_DIGITAL_36) == 1)
        C36 = 1;
    else
        C36 = 0;
    if (digitalRead(PIN_DIGITAL_37) == 1)
        C37 = 1;
    else
        C37 = 0;
    if (digitalRead(PIN_DIGITAL_38) == 1)
        C38 = 1;
    else
        C38 = 0;
    if (digitalRead(PIN_DIGITAL_39) == 1)
        C39 = 1;
    else
        C39 = 0;
    if (digitalRead(PIN_DIGITAL_40) == 1)
        C40 = 1;
    else
        C40 = 0;
    if (digitalRead(PIN_DIGITAL_41) == 1)
        C41 = 1;
    else
        C41 = 0;
   client.println( "estado" + String(C27));
    //ler a cada segundo
    if (currentMillis - tempoAnterior > tempoEnvio)
    {
        tempoAnterior = currentMillis; // Salva o tempo atual
        /*Atualiza informação dos componentes*/
        /*temperatura*/
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
        /*presensa*/
        String c27 = "&C27=C27|" + String(C27) + ";" + String(C27_PARAM);
        String c28 = "&C28=C28|" + String(C28) + ";" + String(C28_PARAM);
        String c29 = "&C29=C29|" + String(C29) + ";" + String(C29_PARAM);
        String c30 = "&C30=C30|" + String(C30) + ";" + String(C30_PARAM);
        String c31 = "&C31=C31|" + String(C31) + ";" + String(C31_PARAM);
        String c32 = "&C32=C32|" + String(C32) + ";" + String(C32_PARAM);
        String c33 = "&C33=C33|" + String(C33) + ";" + String(C33_PARAM);
        String c34 = "&C34=C34|" + String(C34) + ";" + String(C34_PARAM);
        String c35 = "&C35=C35|" + String(C35) + ";" + String(C35_PARAM);
        String c36 = "&C36=C36|" + String(C36) + ";" + String(C36_PARAM);
        String c37 = "&C37=C37|" + String(C37) + ";" + String(C37_PARAM);
        String c38 = "&C38=C38|" + String(C38) + ";" + String(C38_PARAM);
        String c39 = "&C39=C39|" + String(C39) + ";" + String(C39_PARAM);
        String c40 = "&C40=C40|" + String(C40) + ";" + String(C40_PARAM);
        String c41 = "&C41=C41|" + String(C41) + ";" + String(C41_PARAM);
         /*nivel agua*/
        String c45 = "&C45=C45|" + String(C45) + ";" + String(C45_PARAM);

        String data2 = c01 + c02 + c03 + c04 + c05 + c06 + c07 + c08 + c09 + c10;
        data2= data2 + c27 + c28 + c29 + c30 + c31 + c32 + c33 + c34 + c35 + c36+ c37+ c38+ c39 + c40 + c41+c45;
        // Serial.println("data2: " + String(data2));
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

// Método que inicia la secuencia del Trigger para comenzar a medir
void iniciarTrigger()
{
    // Ponemos el Triiger en estado bajo y esperamos 2 ms
    digitalWrite(PIN_DIGITAL_46, LOW);
    delayMicroseconds(2);

    // Ponemos el pin Trigger a estado alto y esperamos 10 ms
    digitalWrite(PIN_DIGITAL_46, HIGH);
    delayMicroseconds(10);

    // Comenzamos poniendo el pin Trigger en estado bajo
    digitalWrite(PIN_DIGITAL_46, LOW);
}
