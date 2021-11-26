/*
 * codigo para proyecto cdio 3.
 * posee ui con lcd 16x4 y varios sensores infrared
 * info de sensores se envia a Raspb by I2c
 */
 
#include <LiquidCrystal_I2C.h>
#include <EEPROM.h>
#include <Wire.h>
#include <Servo.h>
#include <Keypad.h>

LiquidCrystal_I2C lcd(0x27,16,4);

Servo servo_1;  //servo para habilitar agujero small
Servo servo_2;  //servo para habilitar agujero medio
Servo servo_3;  //servo para habilitar almacen

//define infrared sensors...
#define infrared1 0 //infrared DN80k sensor
#define infrared2 1 //infrared DN80k sensor
#define led A0
#define pin_servo_1 10
#define pin_servo_2 11
#define pin_servo_3 9

#define I2C_SLAVE 0x08


const byte Filas = 4;  //Cuatro filas
const byte Cols = 3;   //Cuatro columnas

//char Teclas [ Filas ][ Cols ] =
// {
//    {'1','2','3','A'},
//    {'4','5','6','B'},
//    {'7','8','9','C'},
//    {'*','0','#','D'}
// };

char Teclas [ Filas ][ Cols ] =
 {
    {'1','2','3'},
    {'4','5','6'},
    {'7','8','9'},
    {'*','0','#'}
 };

//byte Pins_Filas[] = {9,8,7,6};//Pines Arduino a las filasbyte 
//byte Pins_Cols[] = {5,4,3,2}; // Pines Arduino a las columnas.

byte Pins_Filas[] = {8,7,6,5};//Pines Arduino a las filasbyte 
byte Pins_Cols[] = {4,3,2}; // Pines Arduino a las columnas.

//char codigoSecreto[4] = {'2','2','5','5'}; // Aqui va el codigo secreto
char Key;
char words;
int digits [5]; //save los 4 digits of new user pass
int valor;
int new_users[11]; //save passWords new users
int new_pass=0; //save temporaly pass new user to inser it into array
int x=0; //auxiliar en taka dat from eeprom

int pw,admi_pass=3457; // pass 4 admi 3457
int pu,user_pass=2345; //user pass 4 demo

int dat_ee=0;

int pos=0,clave=0;
int plus=0;
int sum=0; //acumula puntos
int k=0;
int points=30;
bool flag=false,detection=false;
bool screen=false; 
bool screen_1=false;
int cursor=5;
int posicion=0;

//ID user
//char user_id [10]={'1','0','9',
//                  '4','9','6','5',
 //                 '6','8','8'
//};

//Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );
Keypad Teclado1 = Keypad(makeKeymap(Teclas), Pins_Filas, Pins_Cols, Filas, Cols);


void setup(){

  Wire.begin(I2C_SLAVE);
  lcd.init();
  lcd.backlight();
  lcd.setBacklight(HIGH);
  pinMode(infrared1,INPUT_PULLUP);
  pinMode(infrared2,INPUT_PULLUP);
  pinMode(led,OUTPUT);
  servo_1.attach(pin_servo_1);
  servo_2.attach(pin_servo_2);
  servo_3.attach(pin_servo_3);
  Serial.begin(9600);
  //keypad.addEventListener(keypadEvent); // Add an event listener for this keypad

  //new_users[0]=take_dat_from_eeprom();
  
  servo_1.write(0); //default position
  servo_2.write(0); //default position
  servo_3.write(0); //default position

  lcd.home();
  Wire.onRequest(sendData);
  Wire.onReceive(receiveData);
  
}

void  loop(){  
  
new_users[0]=user_pass;
  //ui_init();
  
log_in_user();
  //options();
  
  //sign_user();
   //view_eeprom();
  //dat_ee=take_dat_from_eeprom();
  //lcd.print(new_users[0]);
  
}//loop

void options(){

  char k;
  lcd.clear();
  lcd.setCursor(0,0);

  while(1){
    
  lcd.print("PRESS VALOR USO");
  lcd.setCursor(0,1);
  lcd.print("1. USUARIO");
  lcd.setCursor(-4,2);
  lcd.print("2. REGISTRO");
  lcd.setCursor(-4,3);
  lcd.print("3. LIMPIEZA");

  k=Teclado1.waitForKey();
  if(k=='1'){
      log_in_user(); //log user
      break;
  }
  else if(k=='2'){
      sign_user(); //registro user
      break;
  }
  else if(k=='3'){
      log_in_clean(); //limpieza
      break;
  }
   else {
    error_time();
    options();
   }
   
  } //end while
}

void error_time(){
  
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("VALOR ERRONEO");
  lcd.setCursor(3,1);
  lcd.print("VOLVERA A INICIO");
  delay(2000);
}


//funcion inicio UI
void ui_init(){
  
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print(" REVERSE ");
  lcd.setCursor(2,1);
  lcd.print("RECYCLING ");
  lcd.setCursor(-2,2);
  lcd.print(" MACHINE ");
  lcd.setCursor(-2,3);
  lcd.print("  BIENVENIDO");
  delay(3000);
}


void log_in_user(){ //funcion de ingreso usuario limpieza
  
  bool why=false;
  int n=0;
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Ingrese user: ");
 
  pu=admi_password();
  
  for(n=0;n<10;n++){
    if(pu==new_users[n])
      why=true;
  }
  //if(pu==new_users[n]){
  if(why){
    char h;
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Clave Correcta");
    delay(2000);
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("1. Add residuo");
    lcd.setCursor(0,1);
    lcd.print("2. Estadistica");
    lcd.setCursor(-4,2);
    lcd.print("3. Log out");  
    
    h=Teclado1.waitForKey();

    if(h=='1'){
    add_residuo();
    //h="";
    }
    else if(h=='2'){
      watch_points();
      h="";
    }
    else if(h=='3')
      options();
  }
  else {
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("clave erronea");
    delay(1000);
    options();
  }
  
  
}

void log_in_clean(){ //funcion de ingreso usuario limpieza
  
  lcd.clear();
  lcd.setCursor(0,0);
  lcd.print("Ingrese clave: ");
 
  pw=admi_password();
  
  if(pw==admi_pass){
    char h;
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Clave Correcta");
    delay(2000);
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("1. Open gate");
    lcd.setCursor(0,1);
    lcd.print("2. Close gate");
    lcd.setCursor(-4,2);
    lcd.print("3. Log out");  
    //actuador...
    h=Teclado1.waitForKey();

    if(h=='1'){
    open_gate(servo_3,0,180,200); //open gate 4 recolector
    h="";
    }
    else if(h=='2'){
      close_gate(servo_3,180,0,200);
      h="";
    }
    else if(h=='3')
      options();
  }
  else {
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("clave erronea");
    delay(1000);
    options();
  }
  
  
} //end funcion clean

int admi_password(){ //obtiene valores de password limpieza

  int pass,i=0;
  String KeyWord;
  lcd.setCursor(0,1);
  while(i<4){
    Key=Teclado1.waitForKey(); //Espera até presionar botão
    if(Key>='0' && Key<='9'){
      lcd.print('*');
      KeyWord += Key;   //Armazena os caracteres
      i++;
    }
    if(Key=='#')
      i=4;
  }
  if(KeyWord.length()>0) pass=KeyWord.toInt(); 
  else pass=0;

  return pass;
}

int infrared_detection(int pin){ //suma puntos 
  int detect=digitalRead(pin);
  
  if(detect==LOW){
      digitalWrite(led,1); //led auxiliar
      if(flag){
      sum+=10;
      flag=false;
      }
  }
   else {
   digitalWrite(led,0);
   flag=true;
   }

  return sum;
}

void add_residuo(){
          char j;
          lcd.clear();
          while(1){
          lcd.setCursor(0,0);      
          lcd.print("Ingrese Residuo");
          screen=detec_press(infrared1); //verifica presencia objeto antes de sumar puntos
          screen_1=detec_press(infrared2); //verifica presencia objeto antes de sumar puntos
          if(screen){
          points=infrared_detection(infrared1); //suma puntos
          sendData(points); //send points 2 raspb
          move_servo(servo_1,0,180,200);//num servo, init, end, time. (values 4 test only, gotta change em)
          lcd.setCursor(0,1);      
          lcd.print("Points are: ");
          lcd.setCursor(-2,2);      
          lcd.print(points);
          delay(3000);
          
          lcd.clear();
          lcd.setCursor(0,0);      
          lcd.print("1. Nuevo residuo");
          lcd.setCursor(0,1);      
          lcd.print("2. Salir");
          
          j=Teclado1.waitForKey();
          if(j=='1')
              screen_1=screen=false;
          else if(j=='2'){
              options();
             break;
          }
      }
      else if(screen_1){
          points=infrared_detection(infrared1); //suma puntos
          sendData(points); //send points 2 raspb
          move_servo(servo_2,0,180,200);//num servo, init, end, time. (values 4 test only, gotta change em)
          lcd.setCursor(0,1);      
          lcd.print("Points are: ");
          lcd.setCursor(-2,2);      
          lcd.print(points);
          delay(3000);
          
          lcd.clear();
          lcd.setCursor(0,0);      
          lcd.print("1. Nuevo residuo");
          lcd.setCursor(0,1);      
          lcd.print("2. Salir");
          
          j=Teclado1.waitForKey();
          if(j=='1')
              screen_1=screen=false;
          else if(j=='2'){
              options();
             break;
          }
      }
   }
}

void watch_points(){
  
          lcd.clear();
          lcd.setCursor(0,1);      
          lcd.print("Points are: ");
          lcd.setCursor(-2,2);      
          lcd.print(points);
          delay(3000);
          //break;
          options();
}

bool detec_press(int pin){
  int detect=digitalRead(pin);
  if(detect==LOW) detection=true;

   else detection=false;
   return detection;
}

void move_servo(Servo which,int initGrades,int Limgrades,int sleep){
  int pos;
  for (pos=initGrades;pos<=Limgrades;pos++){ 
    which.write(pos);              
    delay(sleep);                     
  }
  for (pos=Limgrades;pos>=initGrades;pos--){ 
    which.write(pos);       
    delay(sleep);                
  }
}

void open_gate(Servo wh,int ini,int endd,int sleep){
  int pos;
  for (pos=ini;pos<=endd;pos++){ 
    wh.write(pos);              
    delay(sleep);                     
  }
}

void close_gate(Servo wh,int ini,int endd,int slep){
  int pos;
  for (pos=endd;pos>=ini;pos--){ 
    wh.write(pos);       
    delay(slep);                
  }
}

void sendData(int val){ //envia valores de puntos a Raspbe by i2c
  Wire.write(val);
}

void receiveData(int nBytes){
  //Serial.print(F("Recieved event"));
  plus=Wire.read();
  
}

void sign_user(){ //funcion para registro usuario

    int pass,i=0,j=0;
    String KeyWord;
    
    lcd.clear();
    lcd.setCursor(0,0);
    lcd.print("Se registrara");
    lcd.setCursor(0,1);
    lcd.print("Ingrese 4 digits");
    lcd.setCursor(-2,2);
    lcd.print("Y presione #");
    lcd.setCursor(-3,3);
    lcd.print("Para Confirmar");
    delay(4000);
    lcd.clear();
  
  lcd.setCursor(4,0);
  lcd.print("New user");
  lcd.setCursor(4,1);
  
  while(k<5){
    Key=Teclado1.waitForKey(); //Espera até presionar botão
    if(Key>='0' && Key<='9'){
      lcd.print(Key);
//      pass=Key.toInt(); 
      //pass=String(Key).toInt(); //ok 4 int
      //digits[k]=pass;           //ok 4 int
      digits[k]=Key;               //4 char
      k++;
    }
    if(Key=='#' && k==4){
      for(j=0;j<4;j++)
          save_eeprom(j,digits[j]); //write into eeprom
      lcd.clear();
      lcd.setCursor(0,0);
      lcd.print("New user");
      lcd.setCursor(0,1);
      lcd.print("Registrado");
      delay(2000);
      lcd.setCursor(0,2);
      lcd.print("Es: ");
      for(int l=0;l<4;l++){
        lcd.print(digits[l]);
        delay(1000);
      }
      delay(2000);
      options();
      
    }
    //else error_time();
      
  }
  
      
}

void save_eeprom(int dir,int val){ 
  
  EEPROM.put(dir,val);
  
}

void view_eeprom(){
  for(int i=0;i<1024;i++)
  Serial.println(EEPROM.read(i));
}

int take_dat_from_eeprom(){
  String dats;
  char ch;
  int st_int;
  for(x=0;x<4;x++)
    dats+=EEPROM.get(x,ch);

    return st_int=dats.toInt();
}
