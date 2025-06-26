async function loadGames() {
    try {
        const response = await fetch('api.php?action=get_games');
        
        // Cek jika respons bukan JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            const text = await response.text();
            throw new Error(`Respons bukan JSON: ${text.slice(0, 100)}...`);
        }

        const games = await response.json();
        // ... kode render game ...
    } catch (error) {
        console.error("Error loading games:", error);
        // Tampilkan pesan error ke user
        const gameList = document.getElementById('game-list-container');
        gameList.innerHTML = '<div class="error">Gagal memuat data. Cek konsol.</div>';
    }
}