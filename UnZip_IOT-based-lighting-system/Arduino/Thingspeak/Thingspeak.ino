#include <ThingSpeak.h>            
#include <ESP8266WiFi.h>

WiFiClient  client;
const char* ssid     = "**************";
const char* password = "**************";
unsigned long counterChannelNumber = 1645485;                // Channel ID
const char * myCounterReadAPIKey = "ZVG66LE4XVX73Y9T";      // Read API Key
const int led = 1;                                 // The field you wish to read

void setup()
{
  pinMode(D1,OUTPUT);
  Serial.begin(115200);
  Serial.println();

  WiFi.begin(ssid, password);                 // write wifi name & password           

  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println();
  Serial.print("Connected, IP address: ");
  Serial.println(WiFi.localIP());
  ThingSpeak.begin(client);
}

void loop() 
{
 int A = ThingSpeak.readLongField(counterChannelNumber, led, myCounterReadAPIKey);
 Serial.println(A);
 digitalWrite(D1,A);
}
