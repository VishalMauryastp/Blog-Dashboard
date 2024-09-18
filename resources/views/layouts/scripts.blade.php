<script>
        document.addEventListener('DOMContentLoaded', function() {
         
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
               
                setTimeout(function() {
                    successMessage.style.transition = 'opacity 0.5s ease-out'; 
                    successMessage.style.opacity = 0;
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 500); 
                }, 2000); 
            }
        });
    </script>