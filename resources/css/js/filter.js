function populate(s1,s2){
  //populate2(s1,s2);

  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if(s1.value == "TOUGHENED"){
    var optionArray = [" | Select glass size", "10 MM TOUGHENED | 10 MM TOUGHENED", "12 MM TOUGHENED | 12 MM TOUGHENED"];
  } else if(s1.value == "LAMINATED"){
    var optionArray = [" | Select glass size","SENTRY|SENTRY","PVB|PVB"];


  } 
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
}

function populate2(s3,s4){
  var s3 = document.getElementById(s3);
  var s4 = document.getElementById(s4);
  s4.innerHTML = "";
        if (s3.value == "SENTRY") {
          var optionArray2 = [" | Select glass size", "6 MM + 0.89 SENTRY + 6 MM|6 MM + 0.89 SENTRY + 6 MM", "8 MM + 0.89 SENTRY + 8 MM|8 MM + 0.89 SENTRY + 8 MM", "5 MM + 0.89 SENTRY + 5 MM|5 MM + 0.89 SENTRY + 5 MM"];
        }
        else if (s3.value == "PVB") {
          var optionArray2 = [" | Select glass size", "5 MM + 1.52PVB +5 MM|5 MM + 1.52PVB +5 MM", "6 MM + 1.52PVB + 6 MM|6 MM + 1.52PVB + 6 MM", "10 MM + 1.52 PVB + 10 MM|10 MM + 1.52 PVB + 10 MM", "12 MM + 1.52 PVB + 12 MM|12 MM + 1.52 PVB + 12 MM", "8 MM + 1.52 PVB + 8 MM + 1.52 PVB + 8 MM|8 MM + 1.52 PVB + 8 MM + 1.52 PVB + 8 MM"];
        }

    for(var option in optionArray2){
    var pair = optionArray2[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s4.options.add(newOption);
  }
}

function selectoption(){
  var opt1 = document.getElementById("glasstype");
  var opt2 = document.getElementById("glassize1");
  var opt3 = document.getElementById("glassize2");
  var opt4 = document.getElementById("coattype");

  if(opt1.value == "") {
    alert("Please select glass type");
    opt1.focus();
    return false;
  }
  if(opt2.value == "") {
    alert("Please select glass size");
    opt2.focus();
    return false;
  }
  if(opt3.value == "") {
    alert("Please select glass size");
    opt3.focus();
    return false;
  }
  if(opt4.value == "") {
    alert("Please select coating type");
    opt4.focus();
    return false;
  }

  return true;
  
}





/*function populate(gt1,gt2) {
    var gt1 = document.getElementById('gt1');
    var gt2 = document.getElementById('gt2');

    gt2.innerHTML = "";

    if (gt1.value == "TOUGHENED") {
      var option = [" | ", "10 MM TOUGHENED | 10 MM TOUGHENED", "12 MM TOUGHENED | 12 MM TOUGHENED"];
    }
    for(var opt in option){
      var pair = option[opt].split(" | ");
      var newopt = document.createElement("option");
      newopt.value = pair[0];
      newopt.innerHTML = pair[1];
      gt2.options.add(newopt);
    }
  }