
//Pacotes utilizados
#include <SPI.h>      /*comentario */
#include <Ethernet.h> /*comentario */


/* Configuracao da placa Ethernet*/
byte mac[] = {0x90, 0xA2, 0xDA, 0x0F, 0x09, 0xA7}; //physical mac address
byte ip[] = {192, 168, 0, 99};                     // ip in lan
byte gateway[] = {192, 168, 0, 1};                 // internet access via router
byte subnet[] = {255, 255, 255, 0};                //subnet mask
EthernetServer server(80);                         //server port
EthernetClient client;
String readString;


void setup()
{
    Serial.begin(9600);
    /*Inicia Ethernet com as configurações definidas*/
    Serial.println("Iniciando Ethernet");
    Ethernet.begin(mac, ip, gateway, subnet);

    Serial.println("Iniciando Servidor");
    server.begin();

    pinMode(5,OUTPUT);

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

                    if (readString.indexOf("/ITE1/OFF") > 0)
                    {
                       Serial.println();
                     Serial.println();
                        Serial.println("OFF----->");
                        digitalWrite(5,LOW);
                       
                    
                   
                    }else
                    
                     if (readString.indexOf("/ITE1/1") > 0)
                    {
                       
                       Serial.println();
                         Serial.println("ON----->");
                          digitalWrite(5,HIGH);
                          
                    
                   
                    }

                }
            }
        }
    }
}
