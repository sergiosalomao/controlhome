//Pacotes utilizados
#include <SPI.h>      /*comentario */
#include <Ethernet.h> /*comentario */
#include "DHT.h"      /*comentario */

DHT sensor(6, DHT11);
float temperatura;
int led = 35;
void setup()
{
   Serial.begin(9600);
   Serial.println("iniciando...");
 
    pinMode(7,OUTPUT);
    pinMode(5,OUTPUT);
    pinMode(6,OUTPUT);
       pinMode(led,OUTPUT);
digitalWrite(7,LOW);
digitalWrite(5,HIGH);

    
       sensor.begin();
}

void loop()
{

temperatura = sensor.readTemperature();
Serial.println("temperatura" + String(temperatura));


if(temperatura > 26){
  digitalWrite(led,LOW);
}else
  digitalWrite(led,HIGH);
   delay(250);
 

}
