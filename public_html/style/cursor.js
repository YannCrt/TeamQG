// Exemple d'écouteur d'événement
document.addEventListener('DOMContentLoaded', function() {
  // Code à exécuter une fois que le DOM est complètement chargé
  console.log("DOM fully loaded and parsed");

  // Exemple d'écouteur de clic sur un bouton
  const button = document.getElementById('myButton');
  button.addEventListener('click', function() {
      console.log("Button clicked");
  });
});



