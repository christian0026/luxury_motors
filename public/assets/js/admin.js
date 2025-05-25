document.addEventListener('DOMContentLoaded', function() {
    // Enable tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
    
    // Confirm before delete
    document.querySelectorAll('.confirm-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this item?')) {
                e.preventDefault();
            }
        });
    });
    
    // Toggle sidebar on mobile
    const sidebar = document.getElementById('sidebarMenu');
    if (sidebar) {
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        if (sidebarCollapse) {
            sidebarCollapse.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }
    }
});