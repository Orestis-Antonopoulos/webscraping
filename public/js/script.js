function showTable(showID) {
    ['table1', 'table2', 'table3', 'table4'].forEach(id => {
        const el = document.getElementById(id);
        const btn = document.querySelector(`button[data-table="${id}"]`);  // Get the button element
        if (id === showID) {
            btn.classList.add('active');
            setTimeout(() => {
                el.style.display = 'grid';
                // Force a reflow to let the browser know that the 'display' has changed
                void el.offsetWidth; 
                el.style.opacity = 1;
                
            }, 150);
        } else {
            el.style.opacity = 0;
            setTimeout(() => el.style.display = 'none', 150);
            btn.classList.remove('active');
        }
    });
}