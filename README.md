<h1 align="center">Welcome to DATA DASHBOARD APP</h1>
<h2>link : kosaniletisim.42web.io</h2>

<h3 align="left">USERNAME : admin</h3>
<h3 align="left">PASSWORD : admin</h3>



<h3 align="left"> VERİTABANI YAPISI </h3>
if0_36630737_webproje adlı bir veritabanı oluşturulur ve içine ;

CREATE TABLE adminler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(40) NOT NULL UNIQUE,
    password VARCHAR(80) NOT NULL
);

CREATE TABLE urunbilgi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tur ENUM('Telefon', 'Tablet', 'Akıllı Saat', 'Laptop') NOT NULL,
    model VARCHAR(100) NOT NULL,
    yil INT NOT NULL,
    pil_omru VARCHAR(50),
    degisen_parca VARCHAR(100),
    durum ENUM('Sıfır', 'İkinci El') NOT NULL,
    renk VARCHAR(50),
    fiyat INT NOT NULL,
    alinma_tarihi DATE NOT NULL,
    notes TEXT
);

<h1>çalışmazsa config.php dosyasını bağlantı ayarlarını kendi ortamınıza göre ayarlayınız!!!</h1>

<h1>KURULUM :</h1>
<h5>Oluşturulan veritabanına sql uzantısı ekleyiniz.</h5>
<h5>(Bu adım link açılmıyorsa geçerlidir) Proje dosyalarını htdocsa yükleyiniz ve gerekiyorsa config.php yi kendinize göre ayarlayınız.</h5> 
<h5>Oluşturulan veritabanına sql uzantısı ekleyiniz.</h5>



kodları yerleştirlir


<p align="left">
</p>
