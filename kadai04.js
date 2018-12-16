function bmiKei1() { 
 // 2つの入力フォームの値を取得
var height = (document.f.height.value)/100;  
var weight = document.f.weight.value;  
if((parseInt(height, 10)<=9999&&
    parseInt(height, 10)>=0)&&
    (parseInt(weight, 10)<=9999&&
    parseInt(weight, 10)>=0)){
    
    
// BMI計算
var bmi1 = parseFloat(weight, 10) /( parseFloat(height, 10)
*parseFloat(height, 10));
 
//テキストボックスに計算した値を表示（小数点2桁）
var bmi = document.getElementById("bmi");
bmi.value = bmi1.toFixed(2);

var bmi2 = document.getElementById("bmi2");
bmi2.value = bmi1.toFixed(2);
}
}

function bmiKei() { 
 // 2つの入力フォームの値を取得
var height = (document.f.height.value)/100;  
var weight = document.f.weight.value;  
if((parseInt(height, 10)<=9999&&
    parseInt(height, 10)>=0)&&
    (parseInt(weight, 10)<=9999&&
    parseInt(weight, 10)>=0)){
    
    
// BMI計算
var bmi1 = parseFloat(weight, 10) /( parseFloat(height, 10)
*parseFloat(height, 10));
 
//テキストボックスに計算した値を表示（小数点2桁）
var bmi = document.getElementById("bmi");
bmi.value = bmi1.toFixed(2);

var bmi2 = document.getElementById("bmi2");
bmi2.value = bmi1.toFixed(2);

 if(bmi1>26.4){
  alert("肥満です");
 }else if(bmi1>24.2){
  alert("過体重です");
 }else if(bmi1<19.8){
  alert("やせです");
 }else{
  alert("標準体型です");
 }
}else{
alert("正しい数値を入力してください");
}
}

function funcOtoko(){
var func = "男性"
var sex = document.getElementById("sex");
sex.value = func;
var sex2 = document.getElementById("sex2");
sex2.value =func;

}

function funcOnnna(){
var func = "女性"
var sex = document.getElementById("sex");
sex.value = func;
var sex2 = document.getElementById("sex2");
sex2.value =func;
}
function upd(){
alert("データを更新しました。");

}
function insert(){
alert("データを追加しました。");

}
function update(id,name){
  var uid = document.getElementById("uid");
  uid.value = id;
  var did = document.getElementById("did");
  did.value = id;
  
  alert("フォームにID"+id+"を入力しました");
}
function on() { 
    var name = document.f.name.value;  
    var new_name = document.getElementById("new_name");
    new_name.value = name;
    
    
    var sex = document.f.sex.value;  
    var new_sex = document.getElementById("new_sex");
    new_sex.value = sex;
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}
function  closeBox(){
    document.getElementById("overlay").style.display = "none";
}
