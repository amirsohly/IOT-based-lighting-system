#include <ESP8266WiFi.h>
#include <ArduinoJson.h>
 
const char* ssid     = "**************";
const char* password = "*************";
const char* host = "192.168.1.109";
String url;

void setup() {
  Serial.begin(115200);
  delay(100);
  
  pinMode(D1, OUTPUT);
  pinMode(D2, OUTPUT);
  
  analogWrite(D1, 0);
  analogWrite(D2, 0);
  
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password); 
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
 
  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

 void loop() {


  Serial.print("connecting to ");
  Serial.println(host);

  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
  url = "/nodeMCU/api/read_all.php?id=2";
  
  Serial.print("Requesting URL: ");
  Serial.println(url);
  
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
  delay(200);
  String section="header";
  while(client.available()){
    String line = client.readStringUntil('\r');
    if (section=="header") { // headers..
     
      if (line=="\n") { // skips the empty space at the beginning 
        section="json";
      }
    }
    else if (section=="json") {  // print the good stuff
      section="ignore";
      String result = line.substring(1);
            Serial.println("result: " + result);

      int size = result.length() + 1;
      char json[size];
      result.toCharArray(json, size);
      
      StaticJsonBuffer<200> jsonBuffer;
      JsonObject& json_parsed = jsonBuffer.parseObject(json);
      if (!json_parsed.success())
      {
        Serial.println("parseObject() failed");
        return;
      }
      
    String led = json_parsed["led"][0]["status"];
    //Serial.println(led.toInt());
    analogWrite(D1, led.toInt());
    //delay(100);
    }
  }
  Serial.println();
  Serial.println("closing connection");
  //delay(1000);
}
