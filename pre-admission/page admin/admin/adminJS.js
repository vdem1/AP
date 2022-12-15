
function confirmFunctionService() {
    if (confirm("Êtes-vous sûr(e) de vouloir supprimer ce service?") == true) {
        document.getElementById("TextString").innerHTML = "supprimé!";
    } else {
        document.getElementById("TextString").innerHTML = "Pas supprimé";
    }
}

function confirmFunctionMedecin() {
    if (confirm("Êtes-vous sûr(e) de vouloir supprimer ce médecin?") == true) {
        document.getElementById("TextString").innerHTML = "supprimé!";
    } else {
        document.getElementById("TextString").innerHTML = "Pas supprimé";
    }
}
