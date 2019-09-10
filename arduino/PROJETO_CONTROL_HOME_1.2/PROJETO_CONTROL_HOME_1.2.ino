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
EthernetServer server(80);                         //server port
EthernetClient client;
String readString;


/*Variaveis de configuracao dos componentes*/
const float VelSom = 34000.0;           /* Velocidade do Som em cm/s utilizada no componente ultrasonico */
long tempoAnterior = 0;                 /* Variável de controle do tempo usada para definir o tempo anterior do envio das informacoes ao servidor*/
long tempoEnvio = 1000;                 /* Variável de controle do tempo usada para definir o tempo de envio das informações ao servidor*/

/*Definicao dos pinos digitais 
*******************************/
int PIN_ANALOGIC_01 = 1; /*Reservado */
int PIN_ANALOGIC_02 = 2; /*Reservado */
int PIN_ANALOGIC_03 = 3; /*Reservado */
int PIN_ANALOGIC_04 = 4; /*Reservado */
int PIN_ANALOGIC_05 = 5; /*Reservado */
int PIN_ANALOGIC_06 = 6; /*Reservado */
int PIN_ANALOGIC_07 = 7; /*Reservado */
int PIN_ANALOGIC_08 = 8; /*Reservado */
int PIN_ANALOGIC_09 = 9; /*Reservado */
int PIN_ANALOGIC_10 = 10; /*Reservado */
int PIN_ANALOGIC_11 = 11; /*Reservado */
int PIN_ANALOGIC_12 = 12; /*Reservado */
int PIN_ANALOGIC_13 = 13; /*Reservado */
int PIN_ANALOGIC_14 = 14; /*Reservado */
int PIN_ANALOGIC_15 = 15; /*Reservado */

/*Definicao dos pinos digitais 
*******************************/
int PIN_DIGITAL_01 = 1;  String PIN_DIGITAL_01_SAIDA = OUTPUT; /*Reservado */
int PIN_DIGITAL_02 = 2;  String PIN_DIGITAL_02_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_03 = 3;  String PIN_DIGITAL_03_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_04 = 4;  String PIN_DIGITAL_04_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_05 = 5;  String PIN_DIGITAL_05_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_06 = 6;  String PIN_DIGITAL_06_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_07 = 7;  String PIN_DIGITAL_07_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_08 = 8;  String PIN_DIGITAL_08_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_09 = 9;  String PIN_DIGITAL_09_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_10 = 10; String PIN_DIGITAL_10_SAIDA = OUTPUT; /*instalado sensor de temperatura */
int PIN_DIGITAL_11 = 11; String PIN_DIGITAL_11_SAIDA = OUTPUT; /*instalado sensor de temperatura */





/*Mapa dos componentes*/
float C01,  C01_PARAM;                  /*instalado sensor de temperatura  */
float C02,  C02_PARAM;                  /*instalado sensor de temperatura  */
float C03,  C03_PARAM;                  /*instalado sensor de temperatura  */
float C04,  C04_PARAM;                  /*instalado sensor de temperatura  */
float C05,  C05_PARAM;                  /*instalado sensor de temperatura  */
float C06,  C06_PARAM;                  /*instalado sensor de temperatura  */
float C07,  C07_PARAM;                  /*instalado sensor de temperatura  */
float C08,  C08_PARAM;                  /*instalado sensor de temperatura  */
float C09,  C09_PARAM;                  /*instalado sensor de temperatura  */
float C010, C010_PARAM;                 /*instalado sensor de temperatura  */
float C011, C011_PARAM;                 /*Reservado  */
float C012, C012_PARAM;                 /*Reservado  */
float C013, C013_PARAM;                 /*Reservado  */
boolean C014; unsigned long C014_PARAM; /*instalado sensor de presenca  */
boolean C015; unsigned long C015_PARAM; /*instalado sensor de presenca  */
boolean C016; unsigned long C016_PARAM; /*instalado sensor de presenca  */
boolean C017; unsigned long C017_PARAM; /*instalado sensor de presenca  */
boolean C018; unsigned long C018_PARAM; /*instalado sensor de presenca  */
boolean C019; unsigned long C019_PARAM; /*instalado sensor de presenca  */
boolean C020; unsigned long C020_PARAM; /*instalado sensor de presenca  */
boolean C021; unsigned long C021_PARAM; /*instalado sensor de presenca  */
boolean C022; unsigned long C022_PARAM; /*instalado sensor de presenca  */
boolean C023; unsigned long C023_PARAM; /*instalado sensor de presenca  */
boolean C024; unsigned long C024_PARAM; /*Reservado  */
boolean C025; unsigned long C025_PARAM; /*Reservado  */
boolean C026; unsigned long C026_PARAM; /*Reservado  */
float C027,C027_PARAM;                  /*Instalado Reservatorio 1*/
float C028,C028_PARAM;                  /*Instalado Reservatorio 2*/
float C029,C029_PARAM;                  /*Reservado  */
float C030,C030_PARAM;                  /*Reservado  */


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
    /*Definicao dos Pinos Analogicos */
    Serial.println("Definindo pinos e tipos de entrada e saida Analogicos");
    pinMode(PIN_ANALOGIC_01, OUTPUT); /*Reservado   */

    /*Definicao dos Pinos Digitais */
    Serial.println("Definindo pinos e tipos de entrada e saida Digitais");
    pinMode(PIN_DIGITAL_01, OUTPUT);       /*Reservado   */
    pinMode(PIN_DIGITAL_02, INPUT_PULLUP); /*comentario  */
    pinMode(PIN_DIGITAL_03, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_04, OUTPUT);        /*comentario  */
    pinMode(PIN_DIGITAL_05, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_06, INPUT);        /*comentario  */
    pinMode(PIN_DIGITAL_07, OUTPUT);       /*comentario  */
    pinMode(PIN_DIGITAL_08, OUTPUT);       /*comentario  */ 
  
    
    
    Serial.begin(9600);
    /*Inicia Ethernet com as configurações definidas*/
    Serial.println("Iniciando Ethernet");
    Ethernet.begin(mac, ip, gateway, subnet);

    Serial.println("Iniciando Servidor");
    server.begin();

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
    /*Atualiza Nivel Agua caixa 01  */
    iniciarTrigger();
    unsigned long tiempo = pulseIn(PIN_DIGITAL_06, HIGH);
    C027 = tiempo * 0.000001 * VelSom / 2.0;
   

   
     

      

    /*Atualiza dados dos sensores de temperatura  */
    unsigned long currentMillis = millis();
    ST1 = (SENSOR_TEMPERATURA_01.readTemperature());
    SU1 = (SENSOR_TEMPERATURA_01.readHumidity());

    /*Configuracao sensor presenca  */
    if (digitalRead(PIN_DIGITAL_04) != SP1)
    {
        SP1 = !SP1;
    //    Serial.println("Estado: " + SP1);
    //    Serial.println("Tempo anterior: " + ((millis() - SPT1) / 1000.00, 1));
        SPT1 = (millis() - SPT1) / 1000, 2;
    }

    //ler a cada segundo
    if (currentMillis - tempoAnterior > tempo)
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
        String sp2 = "&SP2=SP2|" + String(SP2) + ";" + String(SPT2);
        String cx1 = "&CX1=CX1|" + String(CX1);
        String it1 = "&IT1=IT1|" + String(IT1);
    //    Serial.println("Estado do Botao: " + String(IT1));
        String data2 = st1 + st2 + st3 + st4 + st5 + st6 + st7 + st8 + sp1 + sp2 + cx1+ it1;

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



 // Create a client connection
  EthernetClient client = server.available();
  if (client) {
    while (client.connected()) {
      if (client.available()) {
        char c = client.read();

        //read char by char HTTP request
        if (readString.length() < 100) {

          //store characters to string
          readString += c;
          //Serial.print(c);
        }

        //if HTTP request has ended
        if (c == '\n') {

         
          if(readString.indexOf("IT1/1") >0)
          {
            digitalWrite(PIN_DIGITAL_04, HIGH);    
            STATUS_IT1 = false;
             IT1 = 0;
             
              client.println("ON");
          }
          else{
            if(readString.indexOf("IT1/0") >0)
            {
              digitalWrite(PIN_DIGITAL_04, LOW);    
              STATUS_IT1 = true;
              IT1 = 1;
              client.println("OFF");
            }
          }
         
          readString="";


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
}

// Método que inicia la secuencia del Trigger para comenzar a medir
void iniciarTrigger()
{
    // Ponemos el Triiger en estado bajo y esperamos 2 ms
    digitalWrite(PIN_DIGITAL_07, LOW);
    delayMicroseconds(2);

    // Ponemos el pin Trigger a estado alto y esperamos 10 ms
    digitalWrite(PIN_DIGITAL_07, HIGH);
    delayMicroseconds(10);

    // Comenzamos poniendo el pin Trigger en estado bajo
    digitalWrite(PIN_DIGITAL_07, LOW);
}
