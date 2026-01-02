# 140 Karakter Blog CMS

Mikro blog - 140 karakterli yazılar paylaşabileceğiniz basit bir blog sistemi.

## Özellikler

- 140 karakterlik kısa paylaşımlar
- MySQL veritabanı desteği
- PHP tabanlı basit ve hafif sistem
- Responsive tasarım
- Gerçek zamanlı karakter sayacı
- Kolay kurulum

## Kurulum

### Gereksinimler

- PHP 7.0 veya üzeri
- MySQL 5.7 veya üzeri (veya MariaDB)
- Apache/Nginx web sunucusu

### Adım Adım Kurulum

1. **Dosyaları Sunucuya Yükleyin**
   ```bash
   git clone https://github.com/integrumart/blogCMS.git
   cd blogCMS
   ```

2. **Veritabanını Oluşturun**
   
   MySQL'e bağlanın ve database.sql dosyasını çalıştırın:
   ```bash
   mysql -u root -p < database.sql
   ```
   
   Veya MySQL komut satırından:
   ```sql
   source database.sql
   ```

3. **Veritabanı Ayarlarını Yapın**
   
   `config.example.php` dosyasını `config.php` olarak kopyalayın:
   ```bash
   cp config.example.php config.php
   ```
   
   `config.php` dosyasını düzenleyerek veritabanı bilgilerinizi girin:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'veritabani_kullanici_adi');
   define('DB_PASS', 'veritabani_sifresi');
   define('DB_NAME', 'blogcms');
   ```

4. **Web Sunucunuzu Yapılandırın**
   
   Projenin kök dizinini web sunucunuzun document root'una gösterin.

5. **Uygulamayı Açın**
   
   Tarayıcınızda `http://localhost/blogCMS` veya sunucu adresinizi ziyaret edin.

## Kullanım

1. Ana sayfada yeni paylaşım formunu kullanarak 140 karakterlik mesajınızı yazın
2. "Paylaş" butonuna tıklayın
3. Paylaşımınız anında listelenecektir
4. Son 50 paylaşım ana sayfada görüntülenir

## Güvenlik Notları

- `config.php` dosyası hassas bilgiler içerir, bu dosyayı versiyon kontrol sistemine eklemeyin
- Üretim ortamında güçlü veritabanı şifreleri kullanın
- PHP ve MySQL'in güncel sürümlerini kullanın

## Teknik Detaylar

- **Backend**: PHP 7+ (PDO ile veritabanı bağlantısı)
- **Database**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Güvenlik**: Prepared statements (SQL injection koruması), XSS koruması

## Lisans

MIT License - Detaylar için LICENSE dosyasına bakın.

## Katkıda Bulunma

Pull request'ler memnuniyetle karşılanır. Büyük değişiklikler için lütfen önce bir issue açarak neyi değiştirmek istediğinizi tartışın.
