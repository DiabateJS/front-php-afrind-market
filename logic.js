function clearFields(fields){
    for (let i = 0 ; i < fields.length ; i++){
        document.getElementById(fields[i]).value = "";
    }
}