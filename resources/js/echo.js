import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? "https") === "https",
    enabledTransports: ["ws", "wss"],
});

window.Echo.connector.pusher.connection.bind("connected", () => {
    console.log("✅ Laravel Echo/Reverb: Conexión establecida correctamente!");
});

window.Echo.connector.pusher.connection.bind("unavailable", (err) => {
    console.error(
        "❌ Laravel Echo/Reverb: Conexión fallida o no disponible.",
        err,
    );
});
window.Echo.channel("public").listen(".stock.bajo", (e) => {
    alert("se ejecuto el evento");
});
