#include <WiFi.h>
#include <HTTPClient.h>

#include <strings_en.h>
#include <WiFiManager.h>

//-----CONNECTION TO WIFI AND SQL VARIABLES----

const char* ssid = "INFINITUMHDR7D";//"INFINITUMD69F_2.4";//"comisionistas"; //
const char* password = "@84ert543VM@#";//"D3wSeZvq78"; //"eb550f2cca"; //"@84ert543VM@#"; 

// REPLACE with your Domain name and URL path or IP address with path
String serverName = "https://iotsoluciones.000webhostapp.com/usermainpage/widgets/ColorLectures/InsertData.php";

char dataToSend[500];
char dataFormat[] = "user=%s&result=%s&h_ref1=%f&h_ref2=%f&h_ref3=%f&s_ref1=%f&s_ref2=%f&s_ref3=%f&l_ref1=%f&l_ref2=%f&l_ref3=%f&h_samp=%f&s_samp=%f&l_samp=%f&diff=%f&tol=%f&deviceid=%s&clv=%s";


void setup() {
  Serial.begin(9600);
  ConnectToWifi(ssid, password);

  sprintf(dataToSend, dataFormat, "ADMIN", "Correcto",
          81.0, 82.0, 83.0, //Hrefs
          91.0, 92.0, 93.0, //Srefs
          61.0, 62.0, 63.0, //Lrefs
          80.0, 90.0, 60.0, //Samp
          3.0, 5.0, "COLOR001", "%4084ert543VM%40%23");
          
  Serial.println(SendDataToServer(dataToSend));
}

void loop() {
  // put your main code here, to run repeatedly:

}

void ConnectToWifi(const char* ssid, const char* password){
  
  WiFi.begin(ssid, password);

  Serial.println("\nConnect to WIFI: ");
  Serial.println(ssid);
  Serial.println(password);
  
  while (WiFi.status() != WL_CONNECTED) { //Check for the connection
    Serial.print(".");
    delay(500);
  }

  Serial.print("\nConnected to WIFI, Ip = ");
  Serial.print(WiFi.localIP());
}

String SendDataToServer(String datos) {
  
  HTTPClient http;

  String serverPath = serverName + "?"+ datos;

  Serial.print("\nConnecting to Server \nURL: ");
  Serial.print(serverPath);
  
  // Your Domain name with URL path or IP address with path
  http.begin(serverPath.c_str());

  //http.setAuthorization("admin_i80857pa", "%o19N1Kqt21cjkh#");

  Serial.print("\nSending data to server (SQL)");
   // Send HTTP GET request
  int httpResponseCode = http.GET();

  // If you need an HTTP request with a content type: text/plain
  //http.addHeader("Content-Type", "text/plain");
  //int httpResponseCode = http.POST("Hello, World!");
    
  // If you need an HTTP request with a content type: application/json, use the following:
  //http.addHeader("Content-Type", "application/json");
  //int httpResponseCode = http.POST("{\"value1\":\"19\",\"value2\":\"67\",\"value3\":\"78\"}");
        
  if (httpResponseCode>0) {
    Serial.print("\nHTTP Response code: ");
    Serial.println(httpResponseCode);
    String payload = http.getString();
    Serial.print("\nServer Response: ");
    Serial.println(payload);
    return "Datos enviados correctamente";
  }
  else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
    return "Error al enviar";
  }
  // Free resources
  http.end();
}
