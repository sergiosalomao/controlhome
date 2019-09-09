
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

/*Definicao dos pinos digitais 
*******************************/

int PIN_DIGITAL_02 = 2; /*comentario */
int PIN_DIGITAL_03 = 3; /*comentario */

/*Interruptores Disponiveis 
*******************************/

/*status dos interruptores; */
bool STATUS_IT1, STATUS_IT2, STATUS_IT3, STATUS_IT4, STATUS_IT5, STATUS_IT6, STATUS_IT7, STATUS_IT8, STATUS_IT9, STATUS_IT10, STATUS_IT11 = 0;

/*Mapa dos interruptores; */
bool
    IT1,      /*Interruptor Luz Central Varanda ativa pino 3*/
    IT2,      /*Interruptor  */
    IT3,      /*Interruptor  */
    IT4,      /*Interruptor  */
    IT5,      /*Interruptor  */
    IT6,      /*Interruptor  */
    IT7,      /*Interruptor  */
    IT8,      /*Interruptor  */
    IT9,      /*Interruptor  */
    IT10 = 0; /*Interruptor */

void setup()
{
    /*Definicao dos Pinos Digitais */
    pinMode(1, OUTPUT);                    /*Teste  */
    pinMode(PIN_DIGITAL_02, INPUT_PULLUP); /*Teste  */
    pinMode(3, OUTPUT);                    /*Teste  */

    Serial.begin(9600);

    Serial.begin(9600);
}

void loop()
{
    //Serial.println(IT2);
    // STATUS_IT2 = digitalRead(PIN_DIGITAL_02); /*Ler Interruptor Varanda */
    // delay(2000);
    //
    // if (STATUS_IT2 == 0){
    //  digitalWrite(PIN_DIGITAL_03,IT2);       /*grava novo estado do interruptor */
    //  IT2=!IT2;
    // }

    STATUS_IT2 = digitalRead(PIN_DIGITAL_02);
    Serial.println(STATUS_IT2);
    delay(350);

    if (STATUS_IT2 == 0)
    {
        digitalWrite(PIN_DIGITAL_03, estado);
        estado = !estado;
    }
}

//  for (int i = 0; i <= 255;i++){
//    analogWrite(9,i);
//    delay(30);
//
//   if(i >=255) i=0;
//
//  }