

document.getElementById("test").onclick = function Test() {


    var des = document.getElementById("DescriptionPlaceholder").value;
    var loc = document.getElementById("LocationPlaceholder").value;
    var gen = `M`;
    var date = document.getElementById("DatePlaceholder").value;
    var amount = document.getElementById("speciesCountPlaceholder").value;
    var specie = document.getElementById("speciesNamePlaceholder").value;
    var ID = `12`;
    $data2['results'] = $this->database_model->insertObservation(des,loc,gen,date,amount,specie,ID);


}
