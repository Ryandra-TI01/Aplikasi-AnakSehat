// import './echo';
// import Pusher from 'pusher-js';
// window.Pusher = Pusher;
 
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
// window.Echo.private('admin.notifications')
//     .listen('.article.awaiting.approval', (data) => {
//         console.log('Artikel baru menunggu persetujuan:', data.article);
//         // Tampilkan notifikasi di Filament
//         Filament.notify('success', `Artikel baru menunggu persetujuan: ${data.article.title}`);
// });