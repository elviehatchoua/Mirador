import TailSelect from "tail.select";

(function (cash){
    "use strict";
if(cash('#fabriquantId').length){
    alert(cash('#ModeleId').html());
}else{
    alert(cash('#ModeleId').html());
}
    cash('#fabriquantId').on('change', function() {
        alert(cash('#ModeleId').html());
        let fab = cash('#fabriquantId').val() ;
        //modelByFabriq(fab);
    })
})