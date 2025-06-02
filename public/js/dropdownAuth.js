document.addEventListener('DOMContentLoaded', () => {
    const dropdownButton = document.getElementById('dropdownButton2');
    const dropdownMenu = document.getElementById('dropdownMenu2');
  
    dropdownMenu.classList.add('hidden')
    // dropdownMenu.classList.add('opacity-75')
    // Toggle dropdown visibility
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
  