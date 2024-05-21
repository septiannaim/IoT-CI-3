#include <WiFi.h>
#include <HTTPClient.h>
#include <DHT.h>

#define DHTPIN 15     // Pin DHT22 terhubung ke pin GPIO15
#define DHTTYPE DHT22  // Tipe sensor DHT22
#define TRIGGER_PIN 5 // Pin trigger sensor ultrasonik terhubung ke pin GPIO5
#define ECHO_PIN 18   // Pin echo sensor ultrasonik terhubung ke pin GPIO18

DHT dht(DHTPIN, DHTTYPE);

const char* ssid = "D-Link_DIR-612";
const char* password = "";
const char* host = "192.168.0.6";
int httpResponseCode;

void setup() {
  Serial.begin(9600);
  pinMode(TRIGGER_PIN, OUTPUT);
  pinMode(ECHO_PIN, INPUT);

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting to WiFi...");
  }
  Serial.println("Connected to WiFi");
  dht.begin();
}

void loop() {
  float suhu = dht.readTemperature();
  float kelembaban = dht.readHumidity();
  float jarak = readDistance();

  // Menampilkan data suhu, kelembaban, dan jarak di Serial Monitor
  Serial.print("Suhu: ");
  Serial.print(suhu);
  Serial.println(" °C");

  Serial.print("Kelembaban: ");
  Serial.print(kelembaban);
  Serial.println(" %");

  Serial.print("Jarak: ");
  Serial.print(jarak);
  Serial.println(" cm");

  sendData(suhu, kelembaban, jarak);

  delay(10000); // Waktu penundaan antara pengiriman data
}

float readDistance() {
  digitalWrite(TRIGGER_PIN, LOW);
  delayMicroseconds(2);
  digitalWrite(TRIGGER_PIN, HIGH);
  delayMicroseconds(10);
  digitalWrite(TRIGGER_PIN, LOW);

  float duration = pulseIn(ECHO_PIN, HIGH);
  // Mengubah durasi menjadi jarak dalam centimeter
  float jarak = duration * 0.0343 / 2; // Kecepatan suara adalah 343 m/s

  return jarak;
}

void sendData(float temperature, float humidity, float distance) {
  WiFiClient client;
  const int httpPort = 80;

  // Kirim data suhu dan kelembaban
  String suhuLink = "http://" + String(host) + "/dashboard-CI3/Kirimdata/kirimdata?suhu=" + String(temperature) + "&kelembaban=" + String(humidity);
  HTTPClient http;
  http.begin(client, suhuLink);
  httpResponseCode = http.GET();

  if (httpResponseCode > 0) {
    String response = http.getString();
    Serial.println(response);
  } else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  http.end();

  // Kirim data jarak
  String jarakLink = "http://" + String(host) + "/dashboard-CI3/Kirimdata/api_jarak?nilai=" + String(distance);
  http.begin(client, jarakLink);
  httpResponseCode = http.GET();

  if (httpResponseCode > 0) {
    String response = http.getString();
    Serial.println(response);
  } else {
    Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  http.end();
}
