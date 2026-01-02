<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>140 Karakter Blog CMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>📝 140 Karakter Blog</h1>
            <p class="subtitle">Düşüncelerinizi 140 karakterle paylaşın</p>
        </header>

        <!-- Post Creation Form -->
        <div class="create-post">
            <h2>Yeni Paylaşım</h2>
            <form method="POST" action="create_post.php" id="postForm">
                <textarea 
                    name="content" 
                    id="content" 
                    maxlength="140" 
                    placeholder="Ne düşünüyorsunuz? (Maksimum 140 karakter)"
                    required
                ></textarea>
                <div class="form-footer">
                    <span id="charCount">0/140</span>
                    <button type="submit">Paylaş</button>
                </div>
            </form>
        </div>

        <!-- Success/Error Messages -->
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            echo '<div class="message success">✓ Paylaşımınız başarıyla eklendi!</div>';
        }
        if (isset($_GET['error'])) {
            $error = htmlspecialchars($_GET['error']);
            echo '<div class="message error">✗ Hata: ' . $error . '</div>';
        }
        ?>

        <!-- Posts List -->
        <div class="posts">
            <h2>Son Paylaşımlar</h2>
            <?php
            require_once 'db.php';
            
            try {
                $pdo = getDBConnection();
                $stmt = $pdo->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 50");
                $posts = $stmt->fetchAll();
                
                if (count($posts) > 0) {
                    foreach ($posts as $post) {
                        $content = htmlspecialchars($post['content']);
                        $date = date('d.m.Y H:i', strtotime($post['created_at']));
                        
                        echo '<div class="post">';
                        echo '<p class="post-content">' . $content . '</p>';
                        echo '<span class="post-date">' . $date . '</span>';
                        echo '</div>';
                    }
                } else {
                    echo '<p class="no-posts">Henüz paylaşım yok. İlk paylaşımı siz yapın!</p>';
                }
            } catch (Exception $e) {
                echo '<p class="error">Paylaşımlar yüklenirken bir hata oluştu.</p>';
            }
            ?>
        </div>

        <footer>
            <p>140 Karakter Blog CMS &copy; 2026</p>
        </footer>
    </div>

    <script>
        // Character counter
        const textarea = document.getElementById('content');
        const charCount = document.getElementById('charCount');
        
        textarea.addEventListener('input', function() {
            const count = this.value.length;
            charCount.textContent = count + '/140';
            
            if (count > 130) {
                charCount.style.color = '#dc3545';
            } else {
                charCount.style.color = '#6c757d';
            }
        });

        // Auto-hide success/error messages after 5 seconds
        setTimeout(function() {
            const messages = document.querySelectorAll('.message');
            messages.forEach(function(msg) {
                msg.style.opacity = '0';
                setTimeout(function() {
                    msg.style.display = 'none';
                }, 300);
            });
        }, 5000);
    </script>
</body>
</html>
