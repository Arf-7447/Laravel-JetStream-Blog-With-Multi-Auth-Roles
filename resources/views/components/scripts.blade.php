<script>
    // Image preview
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('image_preview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    // Group users Table
    // Add <i class="fas fa-chevron-down toggle-icon"></i> And .group-header On Group Headers
    document.addEventListener("DOMContentLoaded", function() {
        const groupHeaders = document.querySelectorAll('.group-header');

        groupHeaders.forEach(header => {
            header.addEventListener('click', function() {
                const group = this.dataset.group;
                const rows = document.querySelectorAll(`.user-row.${group}`);

                rows.forEach(row => {
                    row.classList.toggle('hidden');
                });

                const icon = this.querySelector('.toggle-icon');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            });
        });
    });

    // Search users
    function searchUser() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('.user-row');

        rows.forEach(row => {
            const name = row.querySelector('.user-name').textContent.toLowerCase();
            const email = row.querySelector('.user-email').textContent.toLowerCase();

            if (name.includes(input) || email.includes(input)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    // Toggle password
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const button = field.nextElementSibling;
        const icon = button.querySelector('i');
        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Show alert
    setTimeout(function() {
        document.querySelector('.alert-dismissible').remove(); // Hapus pesan setelah 2 detik
    }, 2000); // Waktu dalam milidetik (2000 ms = 2 detik)

    // Search posts with categories, campus, title, and author
    /*
    function searchPosts() {
        var input, filter, posts, post, title, author, categories, campus, i, txtValue;
        input = document.getElementById('searchInput');
        filter = input.value.toUpperCase();
        posts = document.getElementsByClassName('post');

        for (i = 0; i < posts.length; i++) {
            post = posts[i];
            title = post.querySelector('.post-title');
            author = post.querySelector('.text-gray-500 a');
            categories = post.querySelector('.bg-orange-600');
            campus = post.querySelector('.bg-blue-600');
            txtValue = title.textContent.toUpperCase()
            + ' ' + author.textContent.toUpperCase()
            + ' ' + categories.textContent.toUpperCase()
            + ' ' + campus.textContent.toUpperCase();

            if (txtValue.indexOf(filter) > -1) {
                post.style.display = '';
            } else {
                post.style.display = 'none';
            }
        }
    }
    */

    function searchPosts() {
        var inputDesktop, inputMobile, filter, posts, post, title, author, categories, campus, i, txtValue;
        inputDesktop = document.getElementById('searchInput');
        inputMobile = document.getElementById('searchInputMobile');
        filterDesktop = inputDesktop ? inputDesktop.value.toUpperCase() : "";
        filterMobile = inputMobile ? inputMobile.value.toUpperCase() : "";

        // Combine filters from both inputs
        filter = filterDesktop || filterMobile;

        posts = document.getElementsByClassName('post');

        for (i = 0; i < posts.length; i++) {
            post = posts[i];
            title = post.querySelector('.post-title');
            author = post.querySelector('.text-gray-500 a');
            categories = post.querySelector('.bg-orange-600');
            campus = post.querySelector('.bg-blue-600');
            txtValue = title.textContent.toUpperCase() +
                ' ' + author.textContent.toUpperCase() +
                ' ' + categories.textContent.toUpperCase() +
                ' ' + campus.textContent.toUpperCase();

            if (txtValue.indexOf(filter) > -1) {
                post.style.display = '';
            } else {
                post.style.display = 'none';
            }
        }
    }

    // Show or hide the button when scrolling
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            document.getElementById("backToTopBtn").classList.remove('hidden');
        } else {
            document.getElementById("backToTopBtn").classList.add('hidden');
        }
    }

    // Scroll to the top of the document with a duration of 800ms
    function scrollToTop() {
        // Start scrolling after a delay of 50ms
        setTimeout(function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth' // Use 'smooth' for smooth scroll behavior
            });
        }, 25); // Adjust the delay as needed
    }

    // function scrollToTop() {
    /*
    const scrollStep = -window.scrollY / 0.00001; // Adjust the number of steps for slower scrolling
    let scrollInterval = setInterval(function() {
        if (window.scrollY !== 0) {
            window.scrollBy({
                top: scrollStep,
                behavior: 'smooth' // Set behavior to smooth for smooth scrolling
            });
        } else {
            clearInterval(scrollInterval);
        }
    }, 50); // Adjust the interval for smoother animation
    }
    */
</script>
