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

  // const dropdownButton = document.getElementById('dropdownButton');
  // const dropdownMenu2 = document.getElementById('dropdownMenu');

  // const dropdownButtonMobile99 = document.getElementById('dropdownButtonMobile');
  // const dropdownMenuMobile99 = document.getElementById('dropdownMenuMobile');


  // if(dropdownMenu2.classList.contains('hidden')){
  //     dropdownMenuMobile99.classList.add('hidden')

  // }

  //   // mobile button

  //   dropdownButtonMobile99.addEventListener('click', () => {
  //     console.log('hello');
  //     dropdownMenuMobile99.classList.toggle('hidden');
  //   });
  
  //   document.addEventListener('click', (event) => {
  //     if (!dropdownButtonMobile99.contains(event.target) && !dropdownMenuMobile.contains(event.target)) {
  //       dropdownMenuMobile99.classList.add('hidden');
  //     }
  //   });






  