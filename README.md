# Soru Cevap Modül Nedir ?

Soru Cevap modül, aybarsyildiz/yii2-profil modülüne bağımlı olan ve sisteme giriş yapan kullanıcılara soru sorulması veya sorulara cevap verildiği ve tek bir sorunun tekil olarak gösterildiği bir modüldür.


# Kurulum

Modülün kurulumu, önceden kurulmuş bir vagrant makinesine, yii2-advanced template'i kurularak anlatılacaktır.

Aşağıda anlatılan kurulum işlemlerinde daha önceden bir vagrant makinesi kurmuş, domain ataması yapılmış ve "vagrant up" komutundan sonra "vagrant ssh" ile kurulu vagrant makinesine bağlanmış olduğunuz düşünülmektedir.

    cd /var/www
komutu çalıştırılıp daha sonra "ls" komutu ile yii2-advanced projesini kuracağınız klasörü orada görmeniz gerekmektedir. Eğer göremiyorsanız vagrant kurulum işlemlerini yapmanız gerekmektedir.

    composer create-project yiisoft/yii2-app-advanced ['Proje Klasörü']
komutu ile "Proje Klasörümüze" yii2-advanced templatini kurmuş olduk. Kurduğumuz proje klasörüne girmek için

    cd ['Proje Klaösrü']
komutunu kullandık. Modül yii2-advanced templatetinin içinde bulunan user tablosu migrationuna bağımlı olarak çalıştığı için

    php yii migrate
komutunu çalıştırıp bize sorulan soruya "yes" şeklinde cevap vermemiz gerekir.

Bu işlemi de yaptıktan sonra artık modülümüzü projemize kurabiliriz.

    composer require aybarsyildiz/yii2-profil "dev-main" aydincanaltun/yii2-sorucevap "dev-main"

komutu ile modülümüz sisteme kurulmuş olur. Modülün bağımlı olduğu migrationları kurmak için ise

    php yii migrate/up --migrationPath=@vendor/aydincanaltun/yii2-sorucevap/src/migrations
komutunu çalıştırmak gerekir. Artık modülümüz projenin içerisine tamamen kurulmuştur. Tek eksik kalan kısım ise projeye modüllerimizi tanıtmaktır. Bu tanıtma işlemini de şu adımlar ile yaparız,

1. İlk olarak proje klasörü içindeyken /backend/config/main.php dosyasını veya /frontend/config/main.php dosyasını açarak aşağıda bulunan kodları "main.php" dosyasına eklemek gerekmektedir.

   

    // Eğer ki main.php dosyamızın içindeyken 'modules' başlığı altında bi ayar satırı bulunmaktaysa
    // aşağıda modules'in içinde bulunan kodları taşımamız yeterli olacaktır
    'modules' => [
    	'sorucevap' => 'AydinCanAltun\sorucevap\Module',
    	'profil' => 'aybarsyildiz\profil\Module'
    ],

Bu işlemden sonra 'aydincanaltun/yii2-sorucevap' ve 'aybarsyildiz/yii2-profil' modülleri çalışır hale gelmiştir.

vagrant makinesi kurulurken kullandığınız domain'inin 'advanced' olduğunu ve modülü 'backend' projesi üzerinde çalışacağını varsayarsak modüllere erişmek için

    http://advanced/backend/web/index.php?r=profil
    http://advanced/backend/web/index.php?r=sorucevap

adreslerini kullanmak gerekecektir.

'aydincanaltun/yii2-sorucevap' modülü çoğunlukla 'aybarsyildiz/yii2-profil' modülüne bağlıdır.

# Modüllerden Görüntüler


![enter image description here](http://webprogramlama.aydincanaltun.com/1.png)


![enter image description here](http://webprogramlama.aydincanaltun.com/2.png)

![enter image description here](http://webprogramlama.aydincanaltun.com/3.png)

![enter image description here](http://webprogramlama.aydincanaltun.com/4.png)

![enter image description here](http://webprogramlama.aydincanaltun.com/5.png)

![enter image description here](http://webprogramlama.aydincanaltun.com/6.png)

![enter image description here](http://webprogramlama.aydincanaltun.com/diagram.png)
