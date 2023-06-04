function Envoyer()
{


  var  nom = document.getElementById('nom').value;

  if(nom.charAt(0) !== nom.charAt(0).toUpperCase())
  {
    alert("Nom doit commancer par une majuscule");

  }
  else { document.getElementById('theForm').submit();

  }






}