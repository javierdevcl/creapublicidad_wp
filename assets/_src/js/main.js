import 'flowbite';

// wait for document to finish loading and run domReady function
if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", domReady);
} else {
  domReady();
}

function domReady(){
  let drawer = document.querySelector('#drawer-navigation');
  drawer.classList.toggle('hidden');

}
