<h2>Form Peminjaman</h2>
<form id="borrow-form">
    <label for="member-name">Nama Peminjam:</label>
    <input type="text" id="member-name" required>
    
    <label for="book-name">Nama Buku yang Dipinjam:</label>
    <input type="text" id="book-name" required>
    
    <button type="submit">Pinjam Buku</button>
</form>

<div id="message"></div>

<script>
    const members = ["Alice", "Bob", "Charlie"]; // Daftar anggota
    const books = {
        "Buku A": "Tersedia",
        "Buku B": "Tersedia",
        "Buku C": "Dipinjam"
    };

    document.getElementById("borrow-form").addEventListener("submit", function(event) {
        event.preventDefault();
        
        const memberName = document.getElementById("member-name").value;
        const bookName = document.getElementById("book-name").value;
        const messageElement = document.getElementById("message");

        if (!members.includes(memberName)) {
            messageElement.textContent = "Nama peminjam tidak terdaftar sebagai anggota.";
            messageElement.style.color = "red";
            return;
        }

        if (!(bookName in books)) {
            messageElement.textContent = "Buku tidak ditemukan.";
            messageElement.style.color = "red";
            return;
        }

        if (books[bookName] === "Tersedia") {
            books[bookName] = "Dipinjam"; // Update status buku
            document.getElementById("status-" + bookName.split(" ")[1]).textContent = "Dipinjam";
            messageElement.textContent = "Buku berhasil dipinjam!";
            messageElement.style.color = "green";
        } else {
            messageElement.textContent = "Buku sudah dipinjam.";
            messageElement.style.color = "red";
        }
    });
</script>

</body>
</html>
