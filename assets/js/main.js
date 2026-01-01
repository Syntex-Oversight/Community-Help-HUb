// Main JS for Community Help Hub
// - Theme toggle
// - Simple demo live feed updater

(function(){
    // Theme toggle button
    function setTheme(theme){
        var el = document.getElementById('theme-style');
        if(!el) return;
        el.href = (theme === 'dark') ? 'css/dark.css' : 'css/style.css';
        try{ localStorage.setItem('theme', theme); } catch(e){}
    }

    document.addEventListener('DOMContentLoaded', function(){
        var tbtn = document.getElementById('themeToggle');
        if(tbtn){
            tbtn.addEventListener('click', function(){
                var cur = localStorage.getItem('theme') === 'dark' ? 'dark' : 'light';
                setTheme(cur === 'dark' ? 'light' : 'dark');
            });
        }

        // Simple live feed placeholder: shows a toast in corner every 12s (demo)
        if(window.bootstrap){
            var toastContainer = document.createElement('div');
            toastContainer.className = 'position-fixed bottom-0 end-0 p-3';
            toastContainer.style.zIndex = 1080;
            document.body.appendChild(toastContainer);

            function showDemoToast(msg){
                var t = document.createElement('div');
                t.className = 'toast align-items-center text-bg-light border-0 show';
                t.role = 'status';
                t.innerHTML = '<div class="d-flex"><div class="toast-body">'+msg+'</div><button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button></div>';
                toastContainer.appendChild(t);
                setTimeout(function(){ t.remove(); }, 7000);
            }

            // demo triggers
            setInterval(function(){
                showDemoToast('New help request posted nearby — check the feed.');
            }, 12000);
        }
    });
})();
