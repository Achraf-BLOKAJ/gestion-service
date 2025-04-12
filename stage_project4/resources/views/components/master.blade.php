<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Custom CSS for sidebar -->
    <style>
        body {
            overflow-x: hidden;
        }
        
        #wrapper {
            display: flex;
        }
        
        #sidebar {
            width: 250px;
            min-height: 100vh;
            transition: all 0.3s;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: fixed;
            z-index: 1000;
        }
        
        /* Styles pour la sidebar réduite */
        #sidebar[data-collapsed="true"] {
            width: 70px;
        }
        
        #sidebar[data-collapsed="true"] .sidebar-text {
            display: none;
        }
        
        #sidebar[data-collapsed="true"] .nav-link {
            text-align: center;
            padding: 10px 5px;
        }
        
        #sidebar[data-collapsed="true"] .nav-link i {
            margin-right: 0 !important;
            font-size: 1.2rem;
        }
        
        #sidebar[data-collapsed="true"] #interventionSelect,
        #sidebar[data-collapsed="true"] label.form-label {
            display: none;
        }
        
        #sidebar[data-collapsed="true"] #sidebarCollapseBtn {
            margin-left: 0;
        }
        
        #sidebar[data-collapsed="true"] #toggle-icon {
            transform: rotate(180deg);
        }
        
        #content {
            width: calc(100% - 250px);
            min-height: 100vh;
            margin-left: 250px;
            transition: all 0.3s;
        }
        
        /* Ajustement pour le contenu quand la sidebar est réduite */
        body.sidebar-collapsed #content {
            width: calc(100% - 70px);
            margin-left: 70px;
        }
        
        .sidebar-header {
            padding: 15px;
        }
        
        .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            border-top: 1px solid #dee2e6;
        }
        
        .nav-link {
            padding: 10px 20px;
            color: #333;
            transition: all 0.3s;
        }
        
        .nav-link:hover {
            background-color: #e9ecef;
            color: #007bff;
        }
        
        /* Style pour le select d'intervention */
        #interventionSelect {
            width: 100%;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        
        /* Style pour la section utilisateur dans le bas de la sidebar */
        .sidebar-footer {
            border-top: 1px solid #dee2e6;
            padding-top: 15px;
        }
        
        .user-info {
            background-color: #f8f9fa;
            border-radius: 4px;
        }
        
        /* Pour mobile view */
        @media (max-width: 992px) {
            #sidebar {
                margin-left: -250px;
            }
            
            #sidebar.active {
                margin-left: 0;
            }
            
            #content {
                width: 100%;
                margin-left: 0;
            }
            
            #content.active {
                margin-left: 250px;
            }
            
            body.sidebar-collapsed #content {
                width: 100%;
                margin-left: 0;
            }
            
            #sidebar[data-collapsed="true"] {
                margin-left: -70px;
            }
            
            #sidebar[data-collapsed="true"].active {
                margin-left: 0;
            }
        }
    </style>
        
    <title>Service | {{ $title }}</title>
</head>

<body>
    <div id="wrapper">
        <!-- Sidebar -->
        @include('partials.nav')
        
        <!-- Page Content -->
        <div id="content">
            <div class="container">
                <div class="row my-5">
                    @include('partials.flashbag')
                </div>
                
                {{ $slot }}
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-wH9yNNlBwG9SzLk6tU2eG6xvU0hJX6tx5e/Df3yAmd4F/5xTGeNqhde8W4sU5Lpk"
    crossorigin="anonymous"></script>

    <!-- Script pour sidebar toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle pour le menu mobile
            const sidebarToggle = document.querySelector('.navbar-toggler');
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            
            if(sidebarToggle) {
                sidebarToggle.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                    content.classList.toggle('active');
                });
            }
            
            // Toggle pour réduire/étendre la sidebar
            const collapseBtn = document.getElementById('sidebarCollapseBtn');
            
            if(collapseBtn) {
                collapseBtn.addEventListener('click', function() {
                    const sidebarElement = document.getElementById('sidebar');
                    const isCollapsed = sidebarElement.getAttribute('data-collapsed') === 'true';
                    
                    // Toggle l'état collapsed
                    sidebarElement.setAttribute('data-collapsed', isCollapsed ? 'false' : 'true');
                    
                    // Ajouter/retirer la classe sur le body pour ajuster le contenu
                    if(!isCollapsed) {
                        document.body.classList.add('sidebar-collapsed');
                    } else {
                        document.body.classList.remove('sidebar-collapsed');
                    }
                    
                    // Sauvegarder l'état dans localStorage pour le conserver entre les pages
                    localStorage.setItem('sidebarCollapsed', isCollapsed ? 'false' : 'true');
                });
            }
            
            // Restaurer l'état de la sidebar au chargement
            const savedState = localStorage.getItem('sidebarCollapsed');
            if(savedState === 'true') {
                const sidebarElement = document.getElementById('sidebar');
                sidebarElement.setAttribute('data-collapsed', 'true');
                document.body.classList.add('sidebar-collapsed');
            }
            
            // Close sidebar on link click in mobile view
            const sidebarLinks = document.querySelectorAll('#sidebar .nav-link');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        sidebar.classList.remove('active');
                        content.classList.remove('active');
                    }
                });
            });
        });
    </script>

@stack('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>