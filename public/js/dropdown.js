document.addEventListener('DOMContentLoaded', () => {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    dropdownMenu.classList.add('hidden')
   
    dropdownButton.addEventListener('click', () => {
      dropdownMenu.classList.toggle('hidden');
      // dropdownMenu.classList.toggle('opacity');
    });
  
    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
      if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
});

  const dropdownButton = document.getElementById('dropdownButton');
  const dropdownMenu2 = document.getElementById('dropdownMenu');

  const dropdownButtonMobile = document.getElementById('dropdownButtonMobile');
  const dropdownMenuMobile = document.getElementById('dropdownMenuMobile');


  if(dropdownMenu2.classList.contains('hidden')){
      dropdownMenuMobile.classList.add('hidden')

  }

    // mobile button

    dropdownButtonMobile.addEventListener('click', () => {
      console.log('hello');
      dropdownMenuMobile.classList.toggle('hidden');
    });
  
    document.addEventListener('click', (event) => {
      if (!dropdownButtonMobile.contains(event.target) && !dropdownMenuMobile.contains(event.target)) {
        dropdownMenuMobile.classList.add('hidden');
      }
    });






  