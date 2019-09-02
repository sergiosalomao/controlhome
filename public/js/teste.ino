/*  control Home
  
    (c)  Augusto Campos 28.11.2014 - BR-Arduino.org
    Usage of the works is permitted provided that this instrument is retained 
    with the works, so that any entity that uses the works is notified of 
    this instrument. DISCLAIMER: THE WORKS ARE WITHOUT WARRANTY. */

//Pacotes utilizados
#include <SPI.h>      //arduino
#include <Ethernet.h> //placa ethernet
#include "DHT.h"      //Sensor de Temperatura

//INFORMACAO DA CENTRAL
String CENTRAL_ID = "1";
String CENTRAL_DESCRICAO = "MODULO CENTRAL 01";
String CENTRAL_MODELO = "ARDUINO MEGA 2560";

//CONFIGURACAO DO NUMERO E TIPO DE SAIDA DOS PINOS ANALOGICOS
const char PIN_ANALOGIC_01 = A1;
bool PIN_ANALOGIC_01_TIPO = "INPUT";

const char PIN_ANALOGIC_02 = A2;
bool PIN_ANALOGIC_02_TIPO = "INPUT";

const char PIN_ANALOGIC_03 = A3;
bool PIN_ANALOGIC_03_TIPO = "INPUT";

const char PIN_ANALOGIC_04 = A4;
bool PIN_ANALOGIC_04_TIPO = "INPUT";

const char PIN_ANALOGIC_05 = A5;
bool PIN_ANALOGIC_05_TIPO = "INPUT";

const char PIN_ANALOGIC_06 = A6;
bool PIN_ANALOGIC_06_TIPO = "INPUT";

const char PIN_ANALOGIC_07 = A7;
bool PIN_ANALOGIC_07_TIPO = "INPUT";

const char PIN_ANALOGIC_08 = A8;
bool PIN_ANALOGIC_08_TIPO = "INPUT";

const char PIN_ANALOGIC_09 = A9;
bool PIN_ANALOGIC_09_TIPO = "OUTPUT";

const char PIN_ANALOGIC_10 = A10;
bool PIN_ANALOGIC_10_TIPO = "INPUT";

const char PIN_ANALOGIC_11 = A11;
bool PIN_ANALOGIC_11_TIPO = "INPUT";

const char PIN_ANALOGIC_12 = A12;
bool PIN_ANALOGIC_12_TIPO = "INPUT";

const char PIN_ANALOGIC_13 = A13;
bool PIN_ANALOGIC_13_TIPO = "INPUT";

const char PIN_ANALOGIC_14 = A14;
bool PIN_ANALOGIC_14_TIPO = "INPUT";

const char PIN_ANALOGIC_15 = A15;
bool PIN_ANALOGIC_15_TIPO = "INPUT";

//PINOS DIGITAIS
int PIN_DIGITAL_01 = 1;
bool PIN_DIGITAL_01_TIPO = "INPUT";

int PIN_DIGITAL_02 = 2;
bool PIN_DIGITAL_02_TIPO = "INPUT";

int PIN_DIGITAL_03 = 3;
bool PIN_DIGITAL_03_TIPO = "INPUT";

int PIN_DIGITAL_04 = 4;
bool PIN_DIGITAL_04_TIPO = "INPUT";

int PIN_DIGITAL_05 = 5;
bool PIN_DIGITAL_05_TIPO = "INPUT";

int PIN_DIGITAL_06 =6;
bool PIN_DIGITAL_06_TIPO = "INPUT";

int PIN_DIGITAL_07 = 7;
bool PIN_DIGITAL_07_TIPO = "INPUT";

int PIN_DIGITAL_08 = 8;
bool PIN_DIGITAL_08_TIPO = "INPUT";

int PIN_DIGITAL_09 = 9;
bool PIN_DIGITAL_09_TIPO = "INPUT";

int PIN_DIGITAL_10 = 10;
bool PIN_DIGITAL_10_TIPO = "INPUT";

int PIN_DIGITAL_11 = 11;
bool PIN_DIGITAL_11_TIPO = "INPUT";

int PIN_DIGITAL_12 = 12;
bool PIN_DIGITAL_12_TIPO = "INPUT";

int PIN_DIGITAL_13 = 13;
bool PIN_DIGITAL_13_TIPO = "INPUT";


int PIN_DIGITAL_14 = 14;
bool PIN_DIGITAL_14_TIPO = "INPUT";


int PIN_DIGITAL_15 = 15;
bool PIN_DIGITAL_15_TIPO = "OUTPUT";

int PIN_DIGITAL_22 = 22;
bool PIN_DIGITAL_22_TIPO = "OUTPUT";


//Sensores Temperatura e umidade disponiveis
float ST1, SU1; //Sala,
float ST2, SU2; //Cozinha
float ST3, SU3; //Quarto 1
float ST4, SU4; //Quarto 2
float ST5, SU5; //Quarto 3
float ST6, SU6; //Suite Master
float ST7, SU7; //Escritorio
float ST8, SU8; //Varanda

//Sensores de Temperatura disponiveis
DHT SENSOR_TEMPERATURA_01(PIN_ANALOGIC_01, DHT11);
DHT SENSOR_TEMPERATURA_02(PIN_ANALOGIC_02, DHT11);
DHT SENSOR_TEMPERATURA_03(PIN_ANALOGIC_03, DHT11);
DHT SENSOR_TEMPERATURA_04(PIN_ANALOGIC_04, DHT11);
DHT SENSOR_TEMPERATURA_05(PIN_ANALOGIC_05, DHT11);
DHT SENSOR_TEMPERATURA_06(PIN_ANALOGIC_06, DHT11);
DHT SENSOR_TEMPERATURA_07(PIN_ANALOGIC_07, DHT11);
DHT SENSOR_TEMPERATURA_08(PIN_ANALOGIC_08, DHT11);

//Sensores Prensenca disponiveis
boolean SP1;
unsigned long SPT1;

boolean SP2;
unsigned long SPT2;

boolean SP3;
unsigned long SPT3;

boolean SP4;
unsigned long SPT4;

boolean SP5;
unsigned long SPT5;

boolean SP6;
unsigned long SPT6;

boolean SP7;
unsigned long SPT7;

boolean SP8;
unsigned long SPT8;

boolean SP9;
unsigned long SPT9;

boolean SP10;
unsigned long SPT10;

boolean SP11;
unsigned long SPT11;

boolean SP12;
unsigned long SPT12;

boolean SP13;
unsigned long SPT13;

boolean SP14;
unsigned long SPT14;

boolean SP15;
unsigned long SPT15;

boolean SP22;
unsigned long SPT22;

//Reles Disponiveis (Retorna status 0 | 1)
String R1, R2, R3, R4, R5, R6, R7, R8;
//String R9,R10,R11,R12,R13,R14,R15,R16;
//String R17,R18,R19,R20,R21,R22,R23,R24;
//String R25,R26,R27,R28,R29,R30,R31,R32;
//String R33,R34,R35,R36,R37,R38,R39,R40;
//String R41,R42,R43,R44,R45,R46,R47,R48;
//String R49,R50,R51,R52,R53,R54,R55,R56;
//String R57,R58,R59,R60,R61,R62,R63,R64;
//String R65,R66,R67,R68,R69,R70,R71,R72;

//Status reles por modulo
String STATUS_M1R1, STATUS_M1R2, STATUS_M1R3, STATUS_M1R4, STATUS_M1R5, STATUS_M1R6, STATUS_M1R7, STATUS_M1R8;
//String STATUS_M2R1,STATUS_M2R2,STATUS_M2R3,STATUS_M2R4,STATUS_M2R5,STATUS_M2R6,STATUS_M2R7,STATUS_M2R8;

//Interruptores diponiveis
String I1, I2, I3, I4, I5, I6, I7, I8, I9, I10;

//Status interruptor
int STATUS_I1 = 0, STATUS_I2 = 0, STATUS_I3 = 0, STATUS_I4 = 0, STATUS_I5 = 0, STATUS_I6 = 0, STATUS_I7 = 0, STATUS_I8 = 0;

//Placa Ethernet Shield
byte mac[] = {0x90, 0xA2, 0xDA, 0x0F, 0x09, 0xA7}; //physical mac address
byte ip[] = {192, 168, 0, 99};                     // ip in lan
byte gateway[] = {192, 168, 0, 1};                 // internet access via router
byte subnet[] = {255, 255, 255, 0};                //subnet mask
EthernetServer server(80);                         //server port

String readString;

void setup()
{
    //PINOS ANALOGICOS
    pinMode(PIN_ANALOGIC_01, PIN_ANALOGIC_01_TIPO);
    pinMode(PIN_ANALOGIC_02, PIN_ANALOGIC_02_TIPO);
    pinMode(PIN_ANALOGIC_03, PIN_ANALOGIC_03_TIPO);
    pinMode(PIN_ANALOGIC_04, PIN_ANALOGIC_04_TIPO);
    pinMode(PIN_ANALOGIC_05, PIN_ANALOGIC_05_TIPO);
    pinMode(PIN_ANALOGIC_06, PIN_ANALOGIC_06_TIPO);
    pinMode(PIN_ANALOGIC_07, PIN_ANALOGIC_07_TIPO);
    pinMode(PIN_ANALOGIC_08, PIN_ANALOGIC_08_TIPO);
    pinMode(PIN_ANALOGIC_09, PIN_ANALOGIC_09_TIPO);
    pinMode(PIN_ANALOGIC_10, PIN_ANALOGIC_10_TIPO);
    pinMode(PIN_ANALOGIC_11, PIN_ANALOGIC_11_TIPO);
    pinMode(PIN_ANALOGIC_12, PIN_ANALOGIC_12_TIPO);
    pinMode(PIN_ANALOGIC_13, PIN_ANALOGIC_13_TIPO);
    pinMode(PIN_ANALOGIC_14, PIN_ANALOGIC_14_TIPO);
    pinMode(PIN_ANALOGIC_15, PIN_ANALOGIC_15_TIPO);

    //PINOS DIGITAIS
    pinMode(PIN_DIGITAL_01, PIN_DIGITAL_01_TIPO);
   pinMode(PIN_DIGITAL_02, PIN_DIGITAL_02_TIPO);
   pinMode(PIN_DIGITAL_03, PIN_DIGITAL_03_TIPO);
   pinMode(PIN_DIGITAL_04, PIN_DIGITAL_04_TIPO);
   pinMode(PIN_DIGITAL_05, PIN_DIGITAL_05_TIPO);
   pinMode(PIN_DIGITAL_06, PIN_DIGITAL_06_TIPO);
   pinMode(PIN_DIGITAL_07, PIN_DIGITAL_07_TIPO);
   pinMode(PIN_DIGITAL_08, PIN_DIGITAL_08_TIPO);
   pinMode(PIN_DIGITAL_09, PIN_DIGITAL_09_TIPO);
   pinMode(PIN_DIGITAL_10, PIN_DIGITAL_10_TIPO);
   pinMode(PIN_DIGITAL_11, PIN_DIGITAL_11_TIPO);
   pinMode(PIN_DIGITAL_12, PIN_DIGITAL_12_TIPO);
   pinMode(PIN_DIGITAL_13, PIN_DIGITAL_13_TIPO);
pinMode(PIN_DIGITAL_22, PIN_DIGITAL_22_TIPO);
    Serial.begin(9600);
    Serial.println("Iniciando sensores temperatura");
    SENSOR_TEMPERATURA_01.begin();
    SENSOR_TEMPERATURA_02.begin();
    SENSOR_TEMPERATURA_03.begin();
    SENSOR_TEMPERATURA_04.begin();
    SENSOR_TEMPERATURA_05.begin();
    SENSOR_TEMPERATURA_06.begin();
    SENSOR_TEMPERATURA_07.begin();
    SENSOR_TEMPERATURA_08.begin();

    Serial.println("Iniciando ethernet temperatura 01!");
    Ethernet.begin(mac, ip, gateway, subnet);
    server.begin();
}

void loop()
{

    if (digitalRead(PIN_DIGITAL_01) != SP1)
    {
        // Ocorreu mudanca na leitura
        SP1 = !SP1;
        Serial.print("Arduino Estado: ");
        Serial.print(SP1);
        Serial.print("\tTempo anterior: ");
        Serial.println((millis() - SPT1) / 1000.00, 1);
        SPT1 = millis();
    }

    if (analogRead(PIN_DIGITAL_02) != SP2)
    {
        SP2 = !SP2;
        SPT2 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_03) != SP3)
    {
        SP3 = !SP3;
        SPT3 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_04) != SP4)
    {
        SP4 = !SP4;
        SPT4 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_05) != SP5)
    {
        SP5 = !SP5;
        SPT5 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_06) != SP6)
    {
        SP6 = !SP6;
        SPT6 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_07) != SP7)
    {
        SP7 = !SP7;
        SPT7 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_08) != SP8)
    {
        SP8 = !SP8;
        SPT8 = millis() / 1000.00, 1;
    }

    if (analogRead(PIN_DIGITAL_09) != SP9)
    {
        SP9 = !SP9;
        SPT9 = millis() / 1000.00, 1;
    }
    if (analogRead(PIN_DIGITAL_10) != SP10)
    {
        SP10 = !SP10;
        SPT10 = millis() / 1000.00, 1;
    }
    if (analogRead(PIN_DIGITAL_11) != SP11)
    {
        SP11 = !SP11;
        SPT11 = millis() / 1000.00, 1;
    }
    if (analogRead(PIN_DIGITAL_12) != SP12)
    {
        SP12 = !SP12;
        SPT12 = millis() / 1000.00, 1;
    }
    if (analogRead(PIN_DIGITAL_13) != SP13)
    {
        SP13 = !SP13;
        SPT13 = millis() / 1000.00, 1;
    }
    if (analogRead(PIN_DIGITAL_14) != SP14)
    {
        SP14 = !SP14;
        SPT14 = millis() / 1000.00, 1;
    }
    if (analogRead(PIN_DIGITAL_15) != SP15)
    {
        SP15 = !SP15;
        SPT15 = millis() / 1000.00, 1;
    }
if (digitalRead(PIN_DIGITAL_22) != SP22)
    {
        SP22 = !SP22;
        SPT22 = millis() / 1000.00, 1;
    }




    //Nomeclatura dos sensores
    //
    //  Serial.print("Umidade: ");
    //  Serial.print(SU1);
    //  Serial.print(" %t");
    //  Serial.print("Temperatura: ");
    //  Serial.print(ST1);
    //  Serial.println(" *C");
    //

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
                    client.println("Access-Control-Allow-Origin: *");
                    client.println("Content-Type: text/html");
                    client.println("Connection: keep-alive");
                    client.println("Allow: GET,HEAD,POST,OPTIONS,TRACE");
                    client.println();

                    //STATUS SENSOR_TEMPERATURA_01
                        ST1 = (SENSOR_TEMPERATURA_01.readTemperature());
                        SU1 = (SENSOR_TEMPERATURA_01.readHumidity());
                        client.println("ST1:" + String(ST1) + ";" + String(SU1));
                    

                    //STATUS SENSOR_TEMPERATURA_02
                        ST2 = (SENSOR_TEMPERATURA_02.readTemperature());
                        SU2 = (SENSOR_TEMPERATURA_02.readHumidity());
                        client.println("ST2:" + String(ST2) + ";" + String(SU2));
                
                    //STATUS SENSOR_TEMPERATURA_03
                        ST3 = (SENSOR_TEMPERATURA_03.readTemperature());
                        SU3 = (SENSOR_TEMPERATURA_03.readHumidity());
                        client.println("ST3:" + String(ST3) + ";" + String(SU3));
                
                    //STATUS SENSOR_TEMPERATURA_04
                        ST4 = (SENSOR_TEMPERATURA_04.readTemperature());
                        SU4 = (SENSOR_TEMPERATURA_04.readHumidity());
                        client.println("ST4:" + String(ST4) + ";" + String(SU4));
                
                    //STATUS SENSOR_TEMPERATURA_05
                        ST5 = (SENSOR_TEMPERATURA_05.readTemperature());
                        SU5 = (SENSOR_TEMPERATURA_05.readHumidity());
                        client.println("ST5:" + String(ST5) + ";" + String(SU5));
                
                    //STATUS SENSOR_TEMPERATURA_06
                        ST6 = (SENSOR_TEMPERATURA_06.readTemperature());
                        SU6 = (SENSOR_TEMPERATURA_06.readHumidity());
                        client.println("ST6:" + String(ST6) + ";" + String(SU6));
                
                    //STATUS SENSOR_TEMPERATURA_07
                        ST7 = (SENSOR_TEMPERATURA_07.readTemperature());
                        SU7 = (SENSOR_TEMPERATURA_07.readHumidity());
                        client.println("ST7:" + String(ST7) + ";" + String(SU7));
                    //STATUS SENSOR_TEMPERATURA_08
                        ST8 = (SENSOR_TEMPERATURA_08.readTemperature());
                        SU8 = (SENSOR_TEMPERATURA_08.readHumidity());
                        client.println("ST8:" + String(ST8) + ";" + String(SU8));
                }
                    /////////////////////////////////////////////////////////////////////////////////////

                    //STATUS SENSOR_PRESENÇA_01
                        client.println("SP1:" + String(SP1) + ";" + String(SPT1) + "|");
                        client.println("SP2:" + String(SP2) + ";" + String(SPT2) + "|");
                        client.println("SP3:" + String(SP3) + ";" + String(SPT3) + "|");
                        client.println("SP4:" + String(SP4) + ";" + String(SPT4) + "|");
                        client.println("SP5:" + String(SP5) + ";" + String(SPT5) + "|");
                        client.println("SP6:" + String(SP6) + ";" + String(SPT6) + "|");
                        client.println("SP7:" + String(SP7) + ";" + String(SPT7) + "|");
                        client.println("SP8:" + String(SP8) + ";" + String(SPT8) + "|");
                        client.println("SP9:" + String(SP9) + ";" + String(SPT9) + "|");
                        client.println("SP10:" + String(SP10) + ";" + String(SPT10) + "|");
                        client.println("SP11:" + String(SP11) + ";" + String(SPT11) + "|");
                        client.println("SP12:" + String(SP12) + ";" + String(SPT12) + "|");
                        client.println("SP13:" + String(SP13) + ";" + String(SPT13) + "|");
                        client.println("SP14:" + String(SP14) + ";" + String(SPT14) + "|");
                        client.println("SP15:" + String(SP15) + ";" + String(SPT15) + "|");
                        client.println("SP22:" + String(SP22) + ";" + String(SPT22) + "|");
                    }
                    
                    //clearing string for next read
                    //readString = "";
                    //Inicio do Response

                    //          //inicio da pagina setup
                    //          client.println("<html>");
                    //          client.println("<head>");
                    //          client.println("<title>Servidor " + C1 + "</title>");
                    //          client.println("</head>");
                    //          client.println("<body>");
                    //          client.println("Servidor " + C1);
                    //          client.print("");
                    //          client.println("</body>");

                    //RESPONSE STATUS

                    delay(1);
                    // stopping client
                    client.stop();
                }
            }
        }
    }
}