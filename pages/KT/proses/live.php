<script>
function showpelanggan(str) {
    if (str.length == 0) {
        document.getElementById('nama_pelanggan').value = "";
        return;
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText); // Tambahkan log di sini
                document.getElementById('nama_pelanggan').value = this.responseText;
            }
        };
        xmlhttp.open("GET", "KT/proses/cari.php?q=" + str, true);
        xmlhttp.send();
    }
}

function showlaundry(str) {
    if (str.length == 0) {
        document.getElementById('atribut').value = "";
        return;
    } else {
        let xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('atribut').value = this.responseText;
            }
        };
        xmlhttp.open("GET", "KT/proses/cari.php?b=" + str, true);
        xmlhttp.send();
    }
}
</script>