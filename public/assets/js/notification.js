// Показываем уведомление при загрузке страницы при успешном действии
window.onload = function() {
    const toast = document.getElementById('notification-toast');
    if(toast) {
        toast.classList.add('show');
        setTimeout(() => {
            toast.classList.remove('show');
        }, 5000);
    }
};

function hideNotification() {
    document.getElementById('notification-toast').classList.remove('show');
}
