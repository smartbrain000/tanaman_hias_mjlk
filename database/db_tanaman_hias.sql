-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Bulan Mei 2023 pada 06.10
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tanaman_hias`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bunga`
--

CREATE TABLE `bunga` (
  `id_bunga` int(10) NOT NULL,
  `id_ins` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_bunga` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bunga`
--

INSERT INTO `bunga` (`id_bunga`, `id_ins`, `foto`, `nama_bunga`, `harga`, `jumlah`, `deskripsi`) VALUES
(1, 9, 'Sanggar_Bunga_Zennie_Jingga_bunga_kertas_20221004221122.jpg', 'Bunga Kertas', 50000, 10, '<div>Cara Merawat Bunga Kertas :<br>1. Sama halnya dengan tanaman-tanaman lainnya yang membutuhkan nutrisi dari pasokan air di masa awal pertumbuhan. Akar yang baru tumbuh membutuhkan jumlah air yang banyak dibandingkan akar yang sudah tumbuh besar. Jadi ketika sudah tumbuh besar, bunga kertas ini akan mengalami fase dimana ia tidak membutuhkan air. Fase ini dinamakan ‘fase kering’.&nbsp;<br><br></div><div>2. Bunga bougenville merupakan tanaman bunga yang membutuhkan banyak asupan sinar matahari. Yaitu sekitar 70% sinar matahari. Bahkan disaat matahari terik sekalipun. Maka dari itu, simpanlah bunga bougenville Anda pada tempat-tempat terbuka yang dapat terkena paparan sinar matahari secara langsung.<br><br></div><div>3. Untuk pemupukan, bunga kertas tidak memerlukan pemupukan secara khusus. Hanya seperti tanaman-tanaman lain pada umumnya. Berikan secara berkala dalam jumlah yang sewajarnya saja. Walaupun bunga bougenville bisa tumbuh dimana-mana, namun tampilan bunga yang diberi pupuk jelas berbeda dengan yang tidak diberi. Bunga yang diberi pupuk akan tumbuh lebih lebat dan subur. Pemupukan bisa dilakukan dalam waktu 2 minggu sekali.<br><br></div><div>4. Jadi tanaman ini akan tumbuh dan berbunga dengan lebat. Maka dari itu, diperlukan pemangkasan agar tanamannya tidak bersulur kemana-mana. Dengan pemangkasan berkala, maka tampilan bunga bougenville bisa disesuaikan dengan keinginan Anda.&nbsp;<br><br></div>'),
(2, 9, 'Sanggar_Bunga_Zennie_Jingga_bunga_asoka_jambon_20221004221253.jpg', 'Asoka Jambon', 10000, 10, '<div>Cara Merawat Bunga Asoka Jambon :<br>1. tidak perlu menyiramnya dalam waktu yang relatif sering, cukup satu kali dalam sehari saja, yaitu bisa Kamu pilih baik di pagi hari maupun di sore hari.<br><br></div><div>2. selanjutnya yang harus kamu lakukan adalah memberikan pupuk pada bunganya. Untuk pemberiannya sendiri, apabila&nbsp; menanamnya di pot berikan pupuk sebanyak 2/3 dari bunga asoka yang ditanam langsung di tanah.<br><br></div><div>3. Penyiangan ini dimaksudkan untuk memangkas gulma atau rumput liar yang akan membuat bunga asoka mengalami hambatan dalam pertumbuhannya. Karena dengan adanya rumput liar di sekitar bunga asoka, maka nutrisi dari pupuk dan air yang sudah diberikan akan lebih banyak diserap oleh rumput liar tersebut dibandingkan oleh bunga asokanya itu sendiri.<br><br></div><div>4. harus rajin memangkas batangnya, supaya bunga asoka bisa tumbuh dengan lebih cantik. Waktu yang terbilang baik untuk melakukan pemangkasan batang ini adalah ketika kamu selesai menyiramnya atau setelah memberi pupuk pada bunga asoka.<br><br></div><div>5. Sama seperti tanaman lainnya, bunga asoka juga harus Kamu tempatkan di tempat yang terpapar sinar matahari, terutama pada pagi hari. Karena sinar matahari pagi sangat berperan penting dalam pertumbuhan bunga asoka itu sendiri.<br><br></div>'),
(3, 9, 'Sanggar_Bunga_Zennie_Jingga_bunga_sutra_bombai_20221004221401.jpg', 'Sutra Bombai', 5000, 10, '<div>Cara Merawat Bunga Sutra Bombai :<br>1. Karena tanaman bunga sutra bombay tidak membutuhkan banyak air, penyiraman dapat dilakukan seperlunya saja.<br><br></div><div>2. Sedangkan pemberian nutrisi tanaman berupa pupuk dapat dilakukan secara rutin setiap 1,5 hingga 2 bulan sekali.<br><br></div>'),
(4, 9, 'Sanggar_Bunga_Zennie_Jingga_bunga_miana_20221004221456.jpg', 'Miana', 5000, 10, '<div>Cara Merawat Bunga Miana :<br>1. Tanaman hias miana termasuk ke dalam tumbuhan yang akrab dengan air. Maka dari itu, siramlah ia satu sampai dua hari sekali.<br><br></div><div>2. Miana merupakan tanaman hias yang menyenangi sinar matahari. Ia dapat tumbuh dengan optimal bila terpapar langsung cahaya matahari.<br><br></div><div>3. Waktu pemberian pupuk yaitu 2 minggu sekali. Tetapi miana masuk ke dalam tanaman mudah untuk tumbuh, meski tak diberi pupuk secara khusus dan rutin.<br><br></div><div>4. Ia dapat hidup di tanah biasa, tapi alangkah lebih baik jika kamu menambahkan pupuk kandang dan kompos di dalamnya. Selain itu, miana termasuk ke dalam jenis tanaman yang bersifat porositas atau mudah menyerap air, maka jenis media tanamnya juga lebih baik menyesuaikan.<br><br></div><div>5. cukup berikan obat selama dua minggu satu kali atau bila terserang hama.<br><br></div><div>6. Supaya ia tak tumbuh sembarangan, cobalah untuk memangkas daunnya bila tampak sudah terlalu rimbun. Pemangkasan dilakukan agar tampilannya lebih sedap dipandang.<br><br></div>'),
(5, 9, 'Sanggar_Bunga_Zennie_Jingga_bunga_brokoli_20221004221549.jpg', 'Bunga Brokoli', 10000, 10, '<div>Cara Merawat Bunga Brokoli :<br>1. Lakukan penyiraman sesuai dengan kondisi media tanam.<br><br></div><div>2. Juga lakukan pemupukan 2 minggu sekali secara rutin.<br><br></div>'),
(6, 11, 'Resa_Flora_bunga_asoka_jambon_20221004215637.jpg', 'Bunga Asoka Jambon', 35000, 10, '<div>Cara Merawat Bunga Asoka :<br>1. tidak perlu menyiramnya dalam waktu yang relatif sering, cukup 1/2 kali dalam sehari saja, yaitu bisa Kamu pilih baik di pagi hari maupun di sore hari.<br><br></div><div>2. selanjutnya yang harus kamu lakukan adalah memberikan pupuk pada bunganya. Untuk pemberiannya sendiri, apabila&nbsp; menanamnya di pot berikan pupuk sebanyak 2 minggu sekali dari bunga asoka yang ditanam langsung di tanah.<br><br></div><div>3. Penyiangan ini dimaksudkan untuk memangkas gulma atau rumput liar yang akan membuat bunga asoka mengalami hambatan dalam pertumbuhannya. Karena dengan adanya rumput liar di sekitar bunga asoka, maka nutrisi dari pupuk dan air yang sudah diberikan akan lebih banyak diserap oleh rumput liar tersebut dibandingkan oleh bunga asokanya itu sendiri.<br><br></div><div>4. harus rajin memangkas batangnya, supaya bunga asoka bisa tumbuh dengan lebih cantik. Waktu yang terbilang baik untuk melakukan pemangkasan batang ini adalah ketika kamu selesai menyiramnya atau setelah memberi pupuk pada bunga asoka.<br><br></div><div>5. Sama seperti tanaman lainnya, bunga asoka juga harus Kamu tempatkan di tempat yang terpapar sinar matahari, terutama pada pagi hari. Karena sinar matahari pagi sangat berperan penting dalam pertumbuhan bunga asoka itu sendiri.<br><br></div>'),
(7, 11, 'Resa_Flora_bunga_nusa_indah_20221004215858.jpg', 'Bunga Nusa Indah', 35000, 10, '<div>Cara Merawat Bunga Nusa Indah :<br>1. Tanaman ini akan tumbuh sehat jika terkena sinar matahari pagi dan sore. merupakan tanaman bunga yang membutuhkan banyak asupan sinar matahari. Yaitu sekitar 70% sinar matahari. Bahkan disaat matahari terik sekalipun. Maka dari itu, simpanlah bunga nusa indah Anda pada tempat-tempat terbuka yang dapat terkena paparan sinar matahari secara langsung.<br><br></div><div>2. Untuk penyiraman anda bisa menyesuaikan musim saat itu, jika musim kemarau maka disarankan anda menyiramnya sebanyak 2 kali sehari pada pagi dan sore. Sangat penting untuk mejaga kelembaban tanah di musim kemarau agar bunga puring tumbuh subur.&nbsp;<br><br></div><div>3. Tambahkan bahan organik seperti pupuk kompos atau daun-daun kering untuk memperbaiki struktur dan kadar nutrisi dalam tanah.<br><br><br></div>'),
(8, 11, 'Resa_Flora_bunga_puring_20221004215944.jpg', 'Bunga Puring', 15000, 10, '<div>Cara Merawat Bunga Puring :<br>1. Untuk penyiraman anda bisa menyesuaikan musim saat itu, jika musim kemarau maka disarankan anda menyiramnya sebanyak 2 kali sehari pada pagi dan sore. Sangat penting untuk menjaga kelembaban tanah di musim kemarau agar bunga puring tumbuh subur. Jika musim hujan tiba, anda bisa menyiramnya sebanyak 1 kali saja di pagi atau sore hari tergantung keadaan tanah. Jika tanah sudah lembab anda juga tidak perlu menyiramnya lagi.<br><br></div><div>2. Hindari proses penyiraman berlebih karena dapat menyebabkan busuk akar, siram seperlunya saja.<br><br></div><div>3. jangan lupa untuk menancapkan kayu ataupun besi untuk menjaga agar bunga puring tumbuh tegak dan tidak mudah roboh.<br><br></div><div>4. Selain itu, anda harus melakukan pemangkasan selain untuk merapikan juga membantu proses regenerasi dan pertumbuhan bunga puring lebih cepat dan baik.<br><br></div><div>5. Lakukan penyiangan untuk menjaga kebersihannya dan hindarkan dari adanya rumput liar.<br><br></div><div>6. Lakukan juga pemupukan lanjutan, ini sangat penting untuk menjaga kesuburan bunga puring dan untuk Jangka pemupukan yaitu 2 minggu sekali.<br><br></div>'),
(9, 11, 'Resa_Flora_bunga_brokoli_20221004220117.jpg', 'Bunga Brokoli', 10000, 10, '<div>Cara Merawat Bunga Brokoli :<br>1. tidak perlu menyiramnya dalam waktu yang relatif sering, cukup lakukan sesuai media tanam, yaitu bisa Kamu pilih baik di pagi hari maupun di sore hari.<br><br></div><div>2. selanjutnya yang harus kamu lakukan adalah memberikan pupuk pada bunganya. Untuk pemberiannya sendiri, apabila&nbsp; menanamnya di pot berikan pupuk dalam waktu 2 minggu sekali.<br><br></div><div>3. Penyiangan ini dimaksudkan untuk memangkas gulma atau rumput liar yang akan membuat bunga brokoli mengalami hambatan dalam pertumbuhannya. Karena dengan adanya rumput liar di sekitar bunga brokoli, maka nutrisi dari pupuk dan air yang sudah diberikan akan lebih banyak diserap oleh rumput liar tersebut dibandingkan oleh bunga itu sendiri.<br><br></div><div>4. Sama seperti tanaman lainnya, bunga brokoli juga harus Kamu tempatkan di tempat yang terpapar sinar matahari, terutama pada pagi hari. Karena sinar matahari pagi sangat berperan penting dalam pertumbuhan bunga brokoli itu sendiri.</div>'),
(10, 11, 'Resa_Flora_tanaman_hias_beringin_butterfly__20221004220403.jpg', 'Beringin Butterfly ', 60000, 10, '<div>Cara Merawat Tanaman Hias Beringin Butterfly :<br><br>1. melakukan penyiraman sehari 2x secara rutin,&nbsp;<br>2. memberi pupuk sesuai kebutuhan atau bisa dilakukan 2 minggu 1x. Agar proses tumbuhnya lebih cantik dan rapi<br>3. perlu mengontrol tumbuhnya gulma pada area sekitar atau dalam pot yang digunakan.</div><div>4. perlu melakukan pemangkasan sehingga tanaman ini bisa tumbuh subur, maksimal, dan tampak lebih rapi.<br><br></div>'),
(11, 14, 'BeePark_Argalingga_crisan_20221004191328.jpg', 'Crisan', 30000, 10, '<div>Cara merawat bunga krisan :<br>1. habitat asli bunga krisan adalah dataran yang lebih dingin karena tanaman hias ini tidak bisa tumbuh dengan baik di dataran rendah yang sangat panas. Letakan bunga krisan di tempat yang lebih teduh, namun tetap menerima sedikit penyinaran sinar matahari.&nbsp;<br><br></div><div>2. Jarak penanaman yang tepat akan membuat bunga krisan tumbuh dengan baik karena memperoleh sirkulasi udara yang baik pada setiap tanaman bunga tersebut. Memperhatikan jarak saat menanam bunga krisan juga menghindari terjadinya persaingan antara akar tanaman dalam menyerap air di dalam unsur hara tanah.&nbsp;<br><br></div><div>3. Media tanaman yang bisa menahan air juga dapat menjaga kelembaban lingkungan bunga krisan tersebut agar bisa tumbuh lebih baik.&nbsp; Biasanya suhu yang panas dapat mempercepat penguapan air di media tanam tersebut, sehingga memerlukan media tanam yang lebih besar untuk menahan air.&nbsp;<br><br></div><div>4. Cara menyiramnya pun perlu perhatikan, yakni memberi intensitas air secukupnya saja. Meskipun bunga krisan cenderung menyukai tanah yang lembab, namun jangan sampai memberikan air terlalu banyak, apalagi sampai menggenang di dalam pot. Hal tersebut justru akan membuat bunga krisan lebih cepat busuk dan lama-kelamaan akan mati.&nbsp;<br><br></div><div>5. bunga krisan adalah salah satu tanaman yang memiliki sifat fotoperiode yang artinya membutuhkan sinar matahari penuh untuk bisa mekar dan berbunga secara sempurna.&nbsp;<br><br></div><div>6. memperhatikan suhu dan kelembaban di sekitar tanaman hias ini karena karakteristiknya yang&nbsp; lebih cocok tumbuh di tempat yang lebih sejuk atau cenderung dingin. Bunga krisan juga bisa bertahan hidup lebih lama di daerah dingin atau datang tinggi. Untuk menanganinya, bisa melakukan perlindungan ekstra pada akar dan mahkotanya. Sedangkan pada daerah yang beriklim hangat dapat menyebabkan bunga krisan lebih lambat berbunganya,terutama malam hari yang mengalami perubahan suhu menjadi lebih dingin. Kondisi suhu yang tidak stabil tersebut dapat membuat kuncup bunga krisan berbentuk tidak teratur. Hal ini membuktikan bahwa suhu dan kelembaban memang sangat berpengaruh pada pertumbuhan bunga krisan.<br><br></div><div>7. untuk kesuburan tanaman hias ini adalah pemberian pupuk 2 minggu sekali yang tepat dan dilakukan secara rutin.&nbsp;<br><br></div><div>8. membebaskan bunga krisan dari hama dan gulma adalah dengan cara memberikan nutrisi pada tanaman hias tersebut, menjaga kualitas media tanam, memindahkan pot atau wadah tanaman secara rutin, memangkas rumput liar dan menjaga kebersihan lingkungan sekitarnya.&nbsp;<br><br></div><div>9. Melakukan repotting mungkin banyak disepelekan orang saat merawat tanaman hias, termasuk bunga krisan yang tumbuhnya lebih cepat. Padahal mengganti pot secara rutin dapat menjaga kestabilan pertumbuhan bunga krisan agar lebih optimal.<br><br></div>'),
(12, 14, 'BeePark_Argalingga_mawar_20221004191449.jpg', 'Mawar', 35000, 10, '<div>Cara merawat bunga mawar :<strong><br></strong>1. Gunakan&nbsp; jenis pot yang terbuat dari tanah liat karena jenis wadah tanaman tersebut memiliki banyak pori yang bisa mengalirkan air dengan cepat. Tanaman bunga mawar tidak bisa hidup dengan intensitas air yang berlebihan karena bisa membuatnya cepat membusuk. Jangan biarkan air tergenang di dalam pot atau terlalu lembab dan lembek karena hal tersebut akan menghambat pertumbuhan mawar.<br><br></div><div>2. Tanaman hias bunga mawar membutuhkan media tanam yang tidak terlalu gembur namun tidak pula terlalu padat. Perlu menggunakan media tanam yang sesuai agar membuat bunga mawar bisa lebih subur dan terus berbunga. Gunakan material tanah yang tidak terlalu keras, kemudian campurkan dengan beberapa bahan organic dan pupuk. Media tanam yang berkualitas juga akan menciptakan tumbuhan yang subur dan sehat.&nbsp;<br><br></div><div>3. Penyiraman ini berfungsi agar bunga mawar tidak mudah kering atau layu dan bisa mati karena kekurangan asupan air. Teknik menyiram yang benar untuk tanaman bunga mawar adalah semburan air yang halus misalnya dengan bantuan selang atau aliran air lainnya&nbsp; dilakukan pagi dan sore hari.<br><br></div><div>4. Penyinaran yang cukup dapat memperlancar proses fotosintesis bunga mawar untuk menghasilkan zat makanan. Menjemur bunga mawar di pagi hari sekitar pukul 10 pagi karena dianggap efektif dengan sinar matahari yang belum terlalu terik.&nbsp;<br><br></div><div>5. Bagian bunga mawar yang membusuk, mengering atau melayu harus segera dipangkas agar tidak mengganggu pertumbuhan bagian tanaman yang lain. Perlu diketahui, saat memangkas bagian yang rusak jangan memotong dengan pola diagonal atau menyerong agar tidak menghambat pertumbuhan bagian tumbuhan. perlu memeriksa secara rutin tanaman mawar dan memotong bagian yang rusak dengan lurus menggunakan gunting tanaman agar tidak menularkan penyakit atau kerusakan ke bagian yang lain.&nbsp;<br><br></div><div>6. Pemberian pupuk dapat berfungsi nutrisi bagi bunga mawar agar tumbuh subur karena di dalamnya mengandung nitrogen phosphorus atau fosfor, dan kalium alias NPK yang memang bagus untuk tanaman. Waktu pemberian pupuk yaitu 2 minggu sekali.<br><br></div><div>7. Keberadaan serangga dan gulma atau tanaman liar disekitar tanaman bunga mawar dapat mengganggu pertumbuhannya.<br><br></div><div>8. Serangan penyakit pada bunga mawar bisa diakibatkan karena bakteri, jamur, dan sebagainya yang bisa merusak bagian-bagian tumbuhan secara perlahan.<br><br></div>'),
(13, 14, 'BeePark_Argalingga_bunga_lampion_20230506122719.jpg', 'Bunga Lampion', 25000, 10, '<div>Cara Perawatan Bunga Fuchsia/lampion :<br><strong>1. Siapkan Tempat Yang Teduh Untuk Memindahkan Bunga pada pot</strong></div><div>Perlu diketahui bahwa habitat asli bunga fuchsia adalah dataran yang lebih dingin karena tanaman hias ini tidak bisa tumbuh dengan baik di dataran rendah yang sangat panas. Letakan bunga fuchsia di tempat yang lebih teduh, namun tetap menerima sedikit penyinaran sinar matahari.</div><div><br></div><div><strong>2. Media Tanam</strong></div><div>Membuat olahan media tanam dengan mencampur tanah dan pupuk. dan dipastikan seluruh akar dan pangkalnya tertanam baik agar pertumbuhan tidak terganggu. agar tanaman tidak roboh, padatkan sedikit media tanam disekitar pangkalnya.<br><br></div><div><strong>3. Lakukanlah Penyiraman Bunga Krisan Pada Pagi Hari</strong></div><div>proses penyiramannya agar tanaman hias ini tetap bisa tumbuh subur bisa melakukannya dirasa perlu saja. Meskipun bunga fuchsia cenderung tidak begitu menyukai dengan air berlebih.&nbsp;<br><br></div><div><strong>4. Memberikan Penyinaran Yang Cukup&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong></div><div>Meskipun bunga fuchsia cocok tumbuh di tempat beratap dan sejuk, namun tanaman hias ini tetap memerlukan penyinaran yang cukup dari sinar matahari.&nbsp;<br><br></div><div><strong>5. memberikan pupuk</strong></div><div>Pupuk berguna untuk membuat tanaman jadi lebih sehat dan subur. Untuk hasil yang lebih maksimal, kesuburan tanaman hias ini adalah pemberian pupuk yang tepat dan dilakukan dalam waktu 2 minggu sekali dengan secara rutin.&nbsp;<br><br></div><div><strong>6. Rajin Membersihkan Hama Dan Gulma</strong></div><div>untuk membebaskan bunga fuchsia dari hama dan gulma dengan cara memberikan nutrisi pada tanaman hias tersebut, menjaga kualitas media tanam, memangkas rumput liar dan menjaga kebersihan lingkungan sekitarnya.</div>'),
(14, 14, 'BeePark_Argalingga_marigold_20221004191622.jpg', 'Marigold', 20000, 10, '<div>Cara Perawatan Bunga Merigold :<br><strong>1. Lokasi Tanam&nbsp;</strong></div><div>Perlu diketahui bahwa bunga merigold dapat tumbuh di tempat suhu yang panas ataupun&nbsp; tempat yang dingin karena tanaman hias ini bisa tumbuh dengan baik di dataran rendah yang sangat panas maupun dataran tinggi yang suhunya dingin.&nbsp;</div><div><br><strong>2. Memilih pot dan media tanam yang tepat</strong></div><div>Hal pertama yang harus diperhatikan saat menanam dan merawat bunga merigold adalah memilih media tanam yang tepat. Pilihlah tanah yang punya kandungan air baik.&nbsp;</div><div><br><strong>3. Melakukan penyiraman secara rutin dan teratur</strong></div><div>Siramlah bunga secara rutin. Siram dua kali sehari saat musim panas dan sesuaikan saat musim hujan. Waktu menyiram yang baik adalah pada pagi hari sekitar pukul 7-9 dan sore antara pukul 4-6.</div><div><br><strong>4. Melakukan pemeriksaan dan pemangkasan secara rutin</strong></div><div>Periksalah bagian daun dan ranting secara rutin agar tidak&nbsp; ada bagian busuk yang menempel di tanaman. bila ada bagian yang mengering atau membusuk, sebaiknya segera pangkas.</div><div><br><strong>5. Rajin Membersihkan Hama Dan Gulma</strong></div><div>untuk membebaskan tanaman dari hama dan gulma dengan cara memberikan nutrisi pada tanaman hias tersebut, menjaga kualitas media tanam, memindahkan pot atau wadah tanaman secara rutin, memangkas rumput liar dan menjaga kebersihan lingkungan sekitarnya.</div><div><br><strong>6.&nbsp; Memberikan Pupuk</strong></div><div>Pupuk berguna untuk membuat tanaman jadi lebih sehat dan subur. Untuk hasil yang lebih maksimal, kesuburan tanaman hias ini adalah pemberian pupuk yang tepat dan dilakukan bisa dalam waktu 2 minggu sekali secara rutin.&nbsp;</div><div><br><strong>7. Perhatikan Sinar Matahari</strong></div><div>Sinar matahari juga punya peran penting agar bunga merigold bisa berfotosintesis dan tumbuh dengan baik.&nbsp;</div>'),
(15, 14, 'BeePark_Argalingga_dahlia_20221004191731.jpg', 'Dahlia', 30000, 10, '<div>Cara Merawat Bunga Dahlia :<br>1. Menyiram bunga dahlia yang mulai membesar dapat dilakukan setiap 3-5 hari sekali tergantung cuaca dan setelah selesai dipupuk. Usahakan untuk menyiram secara rutin pada pagi hari dan sore hari agar tanaman tumbuh optimal. Ketika turun hujan, tanaman tidak perlu disiram agar tidak cepat busuk.<br><br></div><div>2. Ketika masih berupa tunas, bunga dahlia tidak perlu ditambahkan pupuk. Setelah agak besar dan dipindahkan ke tanah atau pot, tanaman dapat dipupuk setiap 2 minggu sekali.<br><br></div><div>3. Bila bunga dahlia yang mulai banyak daunnya dan tumbuh besar juga harus dilakukan penjarangan, yaitu memindahkan tanaman ke area yang lebih luas dan diberi jarak antara satu dengan yang lainnya. Namun, langkah ini tidak perlu dilakukan jika bunga telah dipisah dalam pot masing-masing.<br><br></div><div>4. Penyiangan pada dasarnya adalah membersihkan sekeliling tanaman dari pengganggu seperti gulma atau tanaman liar lainnya. Keberadaan tanaman liar seperti ini dapat mengganggu akar bunga dahlia yang sedang berkembang dan menambah persaingan penyerapan unsur hara yang penting untuk pertumbuhan.<br><br></div><div>5. Karena bunga dahlia dapat tumbuh tinggi, perlu sesekali memangkasnya agar tidak terlampau tinggi. Selain itu, bunga dahlia yang sering dipangkas dapat berbunga lebih banyak. juga perlu memangkas ranting, daun, dan kelopak bunga yang sudah kering.<br><br>6. habitat asli bunga dahlia adalah dataran yang lebih dingin karena tanaman hias ini tidak bisa tumbuh dengan baik di dataran rendah yang sangat panas. Letakan bunga dahlia di tempat yang lebih teduh, namun tetap menerima sedikit penyinaran sinar matahari.&nbsp;</div>'),
(16, 15, 'Hikmah_Tani_aglaonema_20221004184339.jpg', 'Aglaonema', 150000, 10, '<div>Cara Merawat Bunga Aglaonema :<br>1. Tanaman hias aglonema yang bertahan di tempat dengan cahaya minim biasanya merupakan jenis yang daunnya berwarna hijau tua, seperti aglaonema Pink Dalmation, Red Emerald dan Modestum. Tanaman hias indoor ini memang bertahan di tempat gelap, tapi juga bisa hidup di area yang terkena cahaya terang. Sedangkan jenis aglaonema yang daunnya bernuansa silver, merah, atau pink, berkembang dengan baik di tempat dengan cahaya terang. Pilih tempat yang mendapat sinar matahari tiap pagi, atau cahaya mentari tak langsung pada siang dan sore hari. Jadi kebutuhan cahaya ini memang harus disesuaikan pula dengan jenis aglaonemanya.<br><br></div><div>2. Jika ingin mendapatkan hasil yang sempurna, Anda perlu menanam tanaman hias aglaonema pada pot dengan media tanah yang ringan, memiliki drainase yang baik, serta sedikit asam.<br><br></div><div>3. Tanaman yang baik tidak membutuhkan banyak cara penyiraman. Kecuali jika cuaca sangat kering dan panas. Berhati-hati lah dalam menyiram Jangan terlalu basah, tanaman akar akan rusak dan penyiraman pun bisa dilakukan pada pagi dan sore hari.<br><br></div><div>4. Tanaman hias aglaonema termasuk punya pertumbuhan yang lambat hingga sedang. Namun memang, ada beberapa spesies dapat tumbuh dengan cepat. Misalnya, tanaman hias aglaonema Silver Bay dan Red Siam Aurora, bisa tumbuh lebih cepat daripada jenis lainnya. Kembali lagi, semua tergantung jenisnya. kebanyakan tanaman hias ini juga bakalan tumbuh lebih lambat ketika ditanam di ruang yang cahayanya redup.<br><br></div><div>5. Tanaman hias aglaonema sangat mudah ditanam secara indoor karena dapat tumbuh subur pada suhu ruangan tertentu. Suhu terbaik untuk tanaman hias ini adalah antara 18-26 derajat Celsius. Aglaonema tidak toleran terhadap dingin dan akan mulai mati jika dibiarkan di bawah 15 derajat Celsius. Umumnya, jika Anda merasa nyaman di dalam ruangan, tanaman hias aglaonema juga akan tumbuh dengan baik dengan suhu seperti itu.<br><br></div><div>6. Tanaman hias ini tumbuh dengan lambat dan tidak membutuhkan banyak pupuk. Biasanya aglaonema cukup diberikan pupuk standar saja yang sudah mengandung mineral dan nutrien yang diperlukan untuk pertumbuhan. Untuk pemupukan bisa dilakukan 2 Minggu sekali.<br><br></div>'),
(17, 15, 'Hikmah_Tani_bunga_mawar_20221004184535.jpg', 'Mawar', 10000, 10, '<div>Cara Merawat Bunga Mawar :<br>1. Gunakan&nbsp; jenis pot yang terbuat dari tanah liat karena jenis wadah tanaman tersebut memiliki banyak pori yang bisa mengalirkan air dengan cepat. Tanaman bunga mawar tidak bisa hidup dengan intensitas air yang berlebihan karena bisa membuatnya cepat membusuk. Jangan biarkan air tergenang di dalam pot atau terlalu lembab dan lembek karena hal tersebut akan menghambat pertumbuhan mawar.<br><br></div><div>2. Tanaman hias bunga mawar membutuhkan media tanam yang tidak terlalu gembur namun tidak pula terlalu padat. Perlu menggunakan media tanam yang sesuai agar membuat bunga mawar bisa lebih subur dan terus berbunga. Gunakan material tanah yang tidak terlalu keras, kemudian campurkan dengan beberapa bahan organic dan pupuk. Media tanam yang berkualitas juga akan menciptakan tumbuhan yang subur dan sehat.&nbsp;<br><br></div><div>3. Penyiraman ini berfungsi agar bunga mawar tidak mudah kering atau layu dan bisa mati karena kekurangan asupan air. Teknik menyiram yang benar untuk tanaman bunga mawar adalah semburan air yang halus misalnya dengan bantuan selang atau aliran air lainnya&nbsp; dilakukan pagi dan sore hari.<br><br></div><div>4. Penyinaran yang cukup dapat memperlancar proses fotosintesis bunga mawar untuk menghasilkan zat makanan. Menjemur bunga mawar di pagi hari sekitar pukul 10 pagi karena dianggap efektif dengan sinar matahari yang belum terlalu terik.&nbsp;<br><br></div><div>5. Bagian bunga mawar yang membusuk, mengering atau melayu harus segera dipangkas agar tidak mengganggu pertumbuhan bagian tanaman yang lain. Perlu diketahui, saat memangkas bagian yang rusak jangan memotong dengan pola diagonal atau menyerong agar tidak menghambat pertumbuhan bagian tumbuhan. perlu memeriksa secara rutin tanaman mawar dan memotong bagian yang rusak dengan lurus menggunakan gunting tanaman agar tidak menularkan penyakit atau kerusakan ke bagian yang lain.&nbsp;<br><br></div><div>6. Pemberian pupuk dapat berfungsi nutrisi bagi bunga mawar agar tumbuh subur karena di dalamnya mengandung nitrogen phosphorus atau fosfor, dan kalium alias NPK yang memang bagus untuk tanaman. Waktu pemberian pupuk yaitu 2 minggu sekali.<br><br></div><div>7. Keberadaan serangga dan gulma atau tanaman liar disekitar tanaman bunga mawar dapat mengganggu pertumbuhannya.<br><br></div><div>8. Serangan penyakit pada bunga mawar bisa diakibatkan karena bakteri, jamur, dan sebagainya yang bisa merusak bagian-bagian tumbuhan secara perlahan.<br><br></div>'),
(18, 15, 'Hikmah_Tani_anggrek_20221004185234.jpg', 'Anggrek', 60000, 10, '<div>Cara Merawat Bunga Anggrek :<br>1. Siramlah anggrek sesuai dengan cuaca yang sedang berlangsung. Saat iklim di lingkungan sedikit tinggi, maka tanaman anggrek bisa disiram paling tidak dua kali dalam sehari. Ketika musim penghujan, apabila Anda menempatkan anggrek di luar rumah, pindahkan ke dalam agar tidak terpericik air hujan hingga media tanam sangat basah dan memicu pembusukan akar.<br><br></div><div>2. Dengan mengatur seberapa terik sinar matahari yang mengenai tanaman, maka tanaman anggrek tidak akan mengalami masalah baik dalam pertumbuhan atau pemberian hasil berupa tampilan yang menarik.<br><br></div><div>3. Bunga anggrek termasuk tanaman tropis yang bisa bertahan pada lingkungan yang cukup lembab. Tingkat kelembaban tanaman ini harus selalu dijaga agar bisa tumbuh dengan baik. Jangan biarkan tanaman mati hanya karena lupa melakukan penyiraman atau memberikan pencahayaan pada tanaman.<br><br></div><div>4. Pemberian pupuk dapat berfungsi nutrisi bagi bunga anggrek agar tumbuh subur karena di dalamnya mengandung nitrogen phosphorus atau fosfor, dan kalium alias NPK yang memang bagus untuk tanaman. Waktu pemberian pupuk yaitu 2 minggu sekali.<br><br></div><div>5. Keberadaan serangga dan gulma atau tanaman liar disekitar tanaman bunga anggrek dapat mengganggu pertumbuhannya.<br><br></div><div>6. Serangan penyakit pada bunga anggrek bisa diakibatkan karena bakteri, jamur, dan sebagainya yang bisa merusak bagian-bagian tumbuhan secara perlahan.<br><br></div>'),
(20, 10, 'AJESAKA_bunga_aglaonema_20211204080056.jpg', 'Bunga Aglaonema', 50000, 10, '<div>Cara Merawat Bunga Aglaonema :<br>1. Tanaman hias aglonema yang bertahan di tempat dengan cahaya minim biasanya merupakan jenis yang daunnya berwarna hijau tua, seperti aglaonema Pink Dalmation, Red Emerald dan Modestum. Tanaman hias indoor ini memang bertahan di tempat gelap, tapi juga bisa hidup di area yang terkena cahaya terang. Sedangkan jenis aglaonema yang daunnya bernuansa silver, merah, atau pink, berkembang dengan baik di tempat dengan cahaya terang. Pilih tempat yang mendapat sinar matahari tiap pagi, atau cahaya mentari tak langsung pada siang dan sore hari. Jadi kebutuhan cahaya ini memang harus disesuaikan pula dengan jenis aglaonemanya.<br><br></div><div>2. Jika ingin mendapatkan hasil yang sempurna, Anda perlu menanam tanaman hias aglaonema pada pot dengan media tanah yang ringan, memiliki drainase yang baik, serta sedikit asam.<br><br></div><div>3. Tanaman yang baik tidak membutuhkan banyak cara penyiraman. Kecuali jika cuaca sangat kering dan panas. Berhati-hati lah dalam menyiram Jangan terlalu basah, tanaman akar akan rusak dan penyiraman pun bisa dilakukan pada pagi dan sore hari.<br><br></div><div>4. Tanaman hias aglaonema termasuk punya pertumbuhan yang lambat hingga sedang. Namun memang, ada beberapa spesies dapat tumbuh dengan cepat. Misalnya, tanaman hias aglaonema Silver Bay dan Red Siam Aurora, bisa tumbuh lebih cepat daripada jenis lainnya. Kembali lagi, semua tergantung jenisnya. kebanyakan tanaman hias ini juga bakalan tumbuh lebih lambat ketika ditanam di ruang yang cahayanya redup.<br><br></div><div>5. Tanaman hias aglaonema sangat mudah ditanam secara indoor karena dapat tumbuh subur pada suhu ruangan tertentu. Suhu terbaik untuk tanaman hias ini adalah antara 18-26 derajat Celsius. Aglaonema tidak toleran terhadap dingin dan akan mulai mati jika dibiarkan di bawah 15 derajat Celsius. Umumnya, jika Anda merasa nyaman di dalam ruangan, tanaman hias aglaonema juga akan tumbuh dengan baik dengan suhu seperti itu.<br><br></div><div>6. Tanaman hias ini tumbuh dengan lambat dan tidak membutuhkan banyak pupuk. Biasanya aglaonema cukup diberikan pupuk standar saja yang sudah mengandung mineral dan nutrien yang diperlukan untuk pertumbuhan. Untuk pemupukan bisa dilakukan 2 Minggu sekali.<br><br></div>'),
(21, 10, 'AJESAKA_kriminil_merah_20211204080059.jpg', 'Bunga Kriminil Merah', 5000, 10, '<div>Cara Merawat Bunga Kriminil Merah :<br>1. Proses Penyiangan<br>Cara merawat kembang krokot pertama adalah dengan melakukan proses penyiangan secara rutin. Proses penyiangan untuk tanaman ini hanya perlu dilakukan setiap sebulan sekali. Hal tersebut karena tanaman jarang ditumbuhi oleh rumput liar atau gulma. Tanaman ini juga terkenal jarang terkena penyakit tanaman hias.<br><br></div><div>2. Pemberian Pupuk Susulan<br>Setelah dua sampai tiga bulan, kamu baru boleh memberikan pupuk susulan pada tanaman. Gali bagian pinggiran pot lalu isi dengan butiran pupuk organik. Lalu tutup lubang menggunakan tanah dan siram dengan air.<br><br></div><div>3. Menjaga Tanaman Tetap Sehat<br>Jenis hama yang sering menyeram tanaman ini diantaranya adalah serangga, ulat, dan semut. Jika hama menyerang tanamanmu, ada baiknya untuk segera menyemprotkan insektisida pada tanaman. Penyakit lain yang dapat dialami oleh tanaman ini adalah bakteri atau jamur patogen. Jika tanamanmu tetap layu meskipun sudah disiram, kamu dapat memberikan fungisida pada tanaman.<br><br></div>'),
(22, 10, 'AJESAKA_asoka_jambon_20211204080060.jpg', 'Bunga Asoka Jambon', 20000, 10, '<div>Cara Merawat Bunga Asoka Jambon :<br>1. tidak perlu menyiramnya dalam waktu yang relatif sering, cukup satu kali dalam sehari saja, yaitu bisa Kamu pilih baik di pagi hari maupun di sore hari.<br><br></div><div>2. selanjutnya yang harus kamu lakukan adalah memberikan pupuk pada bunganya. Untuk pemberiannya sendiri, apabila&nbsp; menanamnya di pot berikan pupuk sebanyak 2/3 dari bunga asoka yang ditanam langsung di tanah.<br><br></div><div>3. Penyiangan ini dimaksudkan untuk memangkas gulma atau rumput liar yang akan membuat bunga asoka mengalami hambatan dalam pertumbuhannya. Karena dengan adanya rumput liar di sekitar bunga asoka, maka nutrisi dari pupuk dan air yang sudah diberikan akan lebih banyak diserap oleh rumput liar tersebut dibandingkan oleh bunga asokanya itu sendiri.<br><br></div><div>4. harus rajin memangkas batangnya, supaya bunga asoka bisa tumbuh dengan lebih cantik. Waktu yang terbilang baik untuk melakukan pemangkasan batang ini adalah ketika kamu selesai menyiramnya atau setelah memberi pupuk pada bunga asoka.<br><br></div><div>5. Sama seperti tanaman lainnya, bunga asoka juga harus Kamu tempatkan di tempat yang terpapar sinar matahari, terutama pada pagi hari. Karena sinar matahari pagi sangat berperan penting dalam pertumbuhan bunga asoka itu sendiri.<br><br></div>'),
(23, 10, 'AJESAKA_sabrina_20211204080062.jpg', 'Bunga Sabrina', 4000, 10, '<div>Cara Merawat Bunga Sabrina/Melati Jepang :<br>1. Menjaga tanaman hias gantung sabrina di dalam rumah sama halnya dengan merawat tanaman hias lainnya. Beri asupan air yang cukup buat tanaman hias ini. Caranya dengan siram secara rutin setiap pagi, agar bunga sabrina tetap bisa tumbuh.<br><br></div><div>2. Selain mencegah datangnya hama, penggunaan pupuk juga bertujuan untuk memberikan nutrisi yang cukup dan merangsang pertumbuhan tanaman.<br><br></div><div>3. Jangan lupa untuk selalu mengganti media tanam bunga sabrina secara rutin. Usakan mengganti dan memperhatikan media tanah bunga sabrina dalam kurun waktu tertentu. Sebab, tanpa disadari, media tanah yang tidak rutin diganti bisa mengubah kadar dalam tanah. Sehingga dapat menyebabkan tanaman \'teracuni\'.<br><br></div><div>4. Jika bunga sabrina digantung di dalam rumah, jangan lupa untuk memindahkannya beberapa jam di luar rumah. Biarkan tanaman hias bunga sabrina mendapatkan udara segar dan cahaya yang cukup. Asupan cahaya dari sinar matahari dapat berpengaruh pada tumbuh kembang bunga sabrina.<br><br></div><div>5. terlalu banyak insektisida justru dikhawatirkan membawa dampak buruk padanya. Menyerap banyak bahan insektisida kemungkinan dapat menyebabkan tanaman bunga sabrina cepat mati. Bahan kimia pengusir serangga ini dapat memperlambat pertumbuhan sabrina secara perlahan.<br><br></div><div>6. Kamu bisa mempercantik tanaman hias dengan menyemprot bagian daunnya. Supata tanaman hias bunga sabrina terlihat semakin segar, lakukan penyemprotan setiap pagi atau sore hari. Tapi jika daunnya masih basah, jangan langsung dijemur karena bisa membuat daun cepat gosong dan kering.<br><br></div><div>7. Perhatikan tumbuhan yang mungkin muncul di sekitar tanaman hias gantung. Selalu cabut rumput atau tumbuhan liar yang banyak tumbuh di sekitar bunga sabrina. Sehingga unsur hara serta nutrisi tanaman hias tidak terserap oleh tumbuhan liar di sekitarnya.<br><br></div><div>8. tanaman hias ini tergolong sebagai salah satu tanaman yang lambat perkembangannya, ia juga mudah terserang penyakit. Sehingga unsur nutrisi yang tepat dan cukup sangat dibutuhkan oleh sabrina.<br><br></div>'),
(24, 10, 'AJESAKA_brokoli_20211204080063.jpg', 'Bunga Brokoli', 6000, 10, '<div>Cara Merawat Bunga Brokoli :<br>1. Lakukan penyiraman sesuai dengan kondisi media tanam.<br><br></div><div>2. Juga lakukan pemupukan 2 minggu sekali secara rutin.<br><br></div>'),
(25, 16, 'Zayanti_Green_House_asoka_jambon_20221004213847.jpg', 'Asoka Jambon', 10000, 10, '<div>Cara Merawat Bunga Asoka Jambon :<br>1. tidak perlu menyiramnya dalam waktu yang relatif sering, cukup satu kali dalam sehari saja, yaitu bisa Kamu pilih baik di pagi hari maupun di sore hari.<br><br></div><div>2. selanjutnya yang harus kamu lakukan adalah memberikan pupuk pada bunganya. Untuk pemberiannya sendiri, apabila&nbsp; menanamnya di pot berikan pupuk sebanyak 2/3 dari bunga asoka yang ditanam langsung di tanah.<br><br></div><div>3. Penyiangan ini dimaksudkan untuk memangkas gulma atau rumput liar yang akan membuat bunga asoka mengalami hambatan dalam pertumbuhannya. Karena dengan adanya rumput liar di sekitar bunga asoka, maka nutrisi dari pupuk dan air yang sudah diberikan akan lebih banyak diserap oleh rumput liar tersebut dibandingkan oleh bunga asokanya itu sendiri.<br><br></div><div>4. harus rajin memangkas batangnya, supaya bunga asoka bisa tumbuh dengan lebih cantik. Waktu yang terbilang baik untuk melakukan pemangkasan batang ini adalah ketika kamu selesai menyiramnya atau setelah memberi pupuk pada bunga asoka.<br><br></div><div>5. Sama seperti tanaman lainnya, bunga asoka juga harus Kamu tempatkan di tempat yang terpapar sinar matahari, terutama pada pagi hari. Karena sinar matahari pagi sangat berperan penting dalam pertumbuhan bunga asoka itu sendiri.<br><br></div>'),
(26, 16, 'Zayanti_Green_House_mawar_20221004214109.jpg', 'Mawar', 10000, 10, '<div>Cara Merawat Bunga Mawar :<br>1. Gunakan&nbsp; jenis pot yang terbuat dari tanah liat karena jenis wadah tanaman tersebut memiliki banyak pori yang bisa mengalirkan air dengan cepat. Tanaman bunga mawar tidak bisa hidup dengan intensitas air yang berlebihan karena bisa membuatnya cepat membusuk. Jangan biarkan air tergenang di dalam pot atau terlalu lembab dan lembek karena hal tersebut akan menghambat pertumbuhan mawar.<br><br></div><div>2. Tanaman hias bunga mawar membutuhkan media tanam yang tidak terlalu gembur namun tidak pula terlalu padat. Perlu menggunakan media tanam yang sesuai agar membuat bunga mawar bisa lebih subur dan terus berbunga. Gunakan material tanah yang tidak terlalu keras, kemudian campurkan dengan beberapa bahan organic dan pupuk. Media tanam yang berkualitas juga akan menciptakan tumbuhan yang subur dan sehat.&nbsp;<br><br></div><div>3. Penyiraman ini berfungsi agar bunga mawar tidak mudah kering atau layu dan bisa mati karena kekurangan asupan air. Teknik menyiram yang benar untuk tanaman bunga mawar adalah semburan air yang halus misalnya dengan bantuan selang atau aliran air lainnya&nbsp; dilakukan pagi dan sore hari.<br><br></div><div>4. Penyinaran yang cukup dapat memperlancar proses fotosintesis bunga mawar untuk menghasilkan zat makanan. Menjemur bunga mawar di pagi hari sekitar pukul 10 pagi karena dianggap efektif dengan sinar matahari yang belum terlalu terik.&nbsp;<br><br></div><div>5. Bagian bunga mawar yang membusuk, mengering atau melayu harus segera dipangkas agar tidak mengganggu pertumbuhan bagian tanaman yang lain. Perlu diketahui, saat memangkas bagian yang rusak jangan memotong dengan pola diagonal atau menyerong agar tidak menghambat pertumbuhan bagian tumbuhan. perlu memeriksa secara rutin tanaman mawar dan memotong bagian yang rusak dengan lurus menggunakan gunting tanaman agar tidak menularkan penyakit atau kerusakan ke bagian yang lain.&nbsp;<br><br></div><div>6. Pemberian pupuk dapat berfungsi nutrisi bagi bunga mawar agar tumbuh subur karena di dalamnya mengandung nitrogen phosphorus atau fosfor, dan kalium alias NPK yang memang bagus untuk tanaman. Waktu pemberian pupuk yaitu 2 minggu sekali.<br><br></div><div>7. Keberadaan serangga dan gulma atau tanaman liar disekitar tanaman bunga mawar dapat mengganggu pertumbuhannya.<br><br></div><div>8. Serangan penyakit pada bunga mawar bisa diakibatkan karena bakteri, jamur, dan sebagainya yang bisa merusak bagian-bagian tumbuhan secara perlahan.<br><br></div>'),
(27, 16, 'Zayanti_Green_House_bunga_miana_20221004214502.jpg', 'Bunga Miana', 7500, 10, '<div>Cara Merawat Bunga Miana :<br>1. Tanaman hias miana termasuk ke dalam tumbuhan yang akrab dengan air. Maka dari itu, siramlah ia satu sampai dua hari sekali.<br><br></div><div>2. Miana merupakan tanaman hias yang menyenangi sinar matahari. Ia dapat tumbuh dengan optimal bila terpapar langsung cahaya matahari.<br><br></div><div>3. Waktu pemberian pupuk yaitu 2 minggu sekali. Tetapi miana masuk ke dalam tanaman mudah untuk tumbuh, meski tak diberi pupuk secara khusus dan rutin.<br><br></div><div>4. Ia dapat hidup di tanah biasa, tapi alangkah lebih baik jika kamu menambahkan pupuk kandang dan kompos di dalamnya. Selain itu, miana termasuk ke dalam jenis tanaman yang bersifat porositas atau mudah menyerap air, maka jenis media tanamnya juga lebih baik menyesuaikan.<br><br></div><div>5. cukup berikan obat selama dua minggu satu kali atau bila terserang hama.<br><br></div><div>6. Supaya ia tak tumbuh sembarangan, cobalah untuk memangkas daunnya bila tampak sudah terlalu rimbun. Pemangkasan dilakukan agar tampilannya lebih sedap dipandang.<br><br></div>'),
(28, 16, 'Zayanti_Green_House_bunga_sabrina_20221004214250.jpg', 'Bunga Sabrina', 10000, 10, '<div>Cara Merawat Bunga Sabrina :<br>1. Menjaga tanaman hias gantung sabrina di dalam rumah sama halnya dengan merawat tanaman hias lainnya. Beri asupan air yang cukup buat tanaman hias ini. Caranya dengan siram secara rutin setiap pagi, agar bunga sabrina tetap bisa tumbuh.<br><br></div><div>2. Selain mencegah datangnya hama, penggunaan pupuk juga bertujuan untuk memberikan nutrisi yang cukup dan merangsang pertumbuhan tanaman.<br><br></div><div>3. Jangan lupa untuk selalu mengganti media tanam bunga sabrina secara rutin. Usakan mengganti dan memperhatikan media tanah bunga sabrina dalam kurun waktu tertentu. Sebab, tanpa disadari, media tanah yang tidak rutin diganti bisa mengubah kadar dalam tanah. Sehingga dapat menyebabkan tanaman \'teracuni\'.<br><br></div><div>4. Jika bunga sabrina digantung di dalam rumah, jangan lupa untuk memindahkannya beberapa jam di luar rumah. Biarkan tanaman hias bunga sabrina mendapatkan udara segar dan cahaya yang cukup. Asupan cahaya dari sinar matahari dapat berpengaruh pada tumbuh kembang bunga sabrina.<br><br></div><div>5. terlalu banyak insektisida justru dikhawatirkan membawa dampak buruk padanya. Menyerap banyak bahan insektisida kemungkinan dapat menyebabkan tanaman bunga sabrina cepat mati. Bahan kimia pengusir serangga ini dapat memperlambat pertumbuhan sabrina secara perlahan.<br><br></div><div>6. Kamu bisa mempercantik tanaman hias dengan menyemprot bagian daunnya. Supata tanaman hias bunga sabrina terlihat semakin segar, lakukan penyemprotan setiap pagi atau sore hari. Tapi jika daunnya masih basah, jangan langsung dijemur karena bisa membuat daun cepat gosong dan kering.<br><br></div><div>7. Perhatikan tumbuhan yang mungkin muncul di sekitar tanaman hias gantung. Selalu cabut rumput atau tumbuhan liar yang banyak tumbuh di sekitar bunga sabrina. Sehingga unsur hara serta nutrisi tanaman hias tidak terserap oleh tumbuhan liar di sekitarnya.<br><br></div><div>8. tanaman hias ini tergolong sebagai salah satu tanaman yang lambat perkembangannya, ia juga mudah terserang penyakit. Sehingga unsur nutrisi yang tepat dan cukup sangat dibutuhkan oleh sabrina.<br><br></div><div>&nbsp;</div>'),
(29, 16, 'Zayanti_Green_House_bunga_brokoli_20221004214623.jpg', 'Bunga Brokoli', 10000, 10, '<div>Cara Merawat Bunga Brokoli :<br>1. Lakukan penyiraman sesuai dengan kondisi media tanam.<br><br></div><div>2. Juga lakukan pemupukan 2 minggu sekali secara rutin.<br><br></div>'),
(30, 25, 'Nur_Sari_Florist_Cemplang_bunga_aglaonema_20230506122559.jpg', 'Bunga Aglaonema', 50000, 10, '<div>Cara Merawat Jenis Bunga Aglaonema :<br>1. Tanaman hias aglaonema yang bertahan di tempat dengan cahaya minim biasanya merupakan jenis yang daunnya berwarna hijau tua, seperti aglaonema Pink Dalmation, Red Emerald dan Modestum. Tanaman hias indoor ini memang bertahan di tempat gelap, tapi juga bisa hidup di area yang terkena cahaya terang. Sedangkan jenis aglaonema yang daunnya bernuansa silver, merah, atau pink, berkembang dengan baik di tempat dengan cahaya terang. Pilih tempat yang mendapat sinar matahari tiap pagi, atau cahaya mentari tak langsung pada siang dan sore hari. Jadi kebutuhan cahaya ini memang harus disesuaikan pula dengan jenis aglaonemanya.<br><br></div><div>2. Jika ingin mendapatkan hasil yang sempurna, Anda perlu menanam tanaman hias aglaonema pada pot dengan media tanah yang ringan, memiliki drainase yang baik, serta sedikit asam.<br><br></div><div>3. Tanaman yang baik tidak membutuhkan banyak cara penyiraman. Kecuali jika cuaca sangat kering dan panas. Berhati-hati lah dalam menyiram Jangan terlalu basah, tanaman akar akan rusak dan penyiraman pun bisa dilakukan pada pagi dan sore hari.<br><br></div><div>4. Tanaman hias aglaonema termasuk punya pertumbuhan yang lambat hingga sedang. Namun memang, ada beberapa spesies dapat tumbuh dengan cepat. Misalnya, tanaman hias aglaonema Silver Bay dan Red Siam Aurora, bisa tumbuh lebih cepat daripada jenis lainnya. Kembali lagi, semua tergantung jenisnya. kebanyakan tanaman hias ini juga bakalan tumbuh lebih lambat ketika ditanam di ruang yang cahayanya redup.<br><br></div><div>5. Tanaman hias aglaonema sangat mudah ditanam secara indoor karena dapat tumbuh subur pada suhu ruangan tertentu. Suhu terbaik untuk tanaman hias ini adalah antara 18-26 derajat Celsius. Aglaonema tidak toleran terhadap dingin dan akan mulai mati jika dibiarkan di bawah 15 derajat Celsius. Umumnya, jika Anda merasa nyaman di dalam ruangan, tanaman hias aglaonema juga akan tumbuh dengan baik dengan suhu seperti itu.<br><br></div><div>6. Tanaman hias ini tumbuh dengan lambat dan tidak membutuhkan banyak pupuk. Biasanya aglaonema cukup diberikan pupuk standar saja yang sudah mengandung mineral dan nutrien yang diperlukan untuk pertumbuhan. Untuk pemupukan bisa dilakukan 2 Minggu sekali.<br><br></div>'),
(31, 25, 'Nur_Sari_Florist_Cemplang_bunga_brokoli_20230506122631.jpg', 'Bunga Brokoli', 10000, 10, '<div>Cara Merawat Bunga Brokoli :<br>1. tidak perlu menyiramnya dalam waktu yang relatif sering, cukup lakukan sesuai media tanam, yaitu bisa Kamu pilih baik di pagi hari maupun di sore hari.<br><br></div><div>2. selanjutnya yang harus kamu lakukan adalah memberikan pupuk pada bunganya. Untuk pemberiannya sendiri, apabila&nbsp; menanamnya di pot berikan pupuk dalam waktu 2 minggu sekali.<br><br></div><div>3. Penyiangan ini dimaksudkan untuk memangkas gulma atau rumput liar yang akan membuat bunga brokoli mengalami hambatan dalam pertumbuhannya. Karena dengan adanya rumput liar di sekitar bunga brokoli, maka nutrisi dari pupuk dan air yang sudah diberikan akan lebih banyak diserap oleh rumput liar tersebut dibandingkan oleh bunga itu sendiri.<br><br></div><div>4. Sama seperti tanaman lainnya, bunga brokoli juga harus Kamu tempatkan di tempat yang terpapar sinar matahari, terutama pada pagi hari. Karena sinar matahari pagi sangat berperan penting dalam pertumbuhan bunga brokoli itu sendiri.<br><br></div>'),
(34, 25, 'Nur_Sari_Florist_Cemplang_bunga_kertas_20230506122653.jpg', 'Bunga Kertas', 100000, 10, '<div>Cara Merawat Bunga Kertas :<br>1. Sama halnya dengan tanaman-tanaman lainnya yang membutuhkan nutrisi dari pasokan air di masa awal pertumbuhan. Akar yang baru tumbuh membutuhkan jumlah air yang banyak dibandingkan akar yang sudah tumbuh besar. Jadi ketika sudah tumbuh besar, bunga kertas ini akan mengalami fase dimana ia tidak membutuhkan air. Fase ini dinamakan ‘fase kering’.&nbsp;<br><br></div><div>2. Bunga bougenville merupakan tanaman bunga yang membutuhkan banyak asupan sinar matahari. Yaitu sekitar 70% sinar matahari. Bahkan disaat matahari terik sekalipun. Maka dari itu, simpanlah bunga bougenville Anda pada tempat-tempat terbuka yang dapat terkena paparan sinar matahari secara langsung.<br><br></div><div>3. Untuk pemupukan, bunga kertas tidak memerlukan pemupukan secara khusus. Hanya seperti tanaman-tanaman lain pada umumnya. Berikan secara berkala dalam jumlah yang sewajarnya saja. Walaupun bunga bougenville bisa tumbuh dimana-mana, namun tampilan bunga yang diberi pupuk jelas berbeda dengan yang tidak diberi. Bunga yang diberi pupuk akan tumbuh lebih lebat dan subur. Pemupukan bisa dilakukan dalam waktu 2 minggu sekali.<br><br></div><div>4. Jadi tanaman ini akan tumbuh dan berbunga dengan lebat. Maka dari itu, diperlukan pemangkasan agar tanamannya tidak bersulur kemana-mana. Dengan pemangkasan berkala, maka tampilan bunga bougenville bisa disesuaikan dengan keinginan Anda.&nbsp;<br><br></div>');
INSERT INTO `bunga` (`id_bunga`, `id_ins`, `foto`, `nama_bunga`, `harga`, `jumlah`, `deskripsi`) VALUES
(35, 15, 'Hikmah_Tani_merigold_20221004185440.jpg', 'Marigold', 15000, 10, '<div>Cara Merawat Bunga Merigold :<br>1. Merigold tumbuh subur di bawah sinar matahari penuh. Bahkan, bunga satu ini tahan terhadap musim panas atau kemarau yang sangat terik. tidak disarankan menanam merigold di area yang teduh, sejuk, dan lembab. Di area seperti itu, merigold rentan terhadap pembusukan dan tidak akan mekar dengan baik. Jangan lupa juga untuk menanam merigold di atas tanah yang subur dengan drainase yang baik.<br><br></div><div>2. Tanaman yang baik tidak membutuhkan banyak cara penyiraman. Kecuali jika cuaca sangat kering dan panas. Berhati-hati lah dalam menyiram marigold. Jangan pernah menyiramnya dari arah atas atau kelopak bunga dan daun. Dalam kondisi yang terlalu basah, tanaman akan rusak dan kelopak bunga cenderung membusuk. Penyiraman pun bisa dilakukan pada pagi dan sore hari.<br><br></div><div>3. merigold sendiri sebenarnya mampu bertahan dalam cuaca tanpa paparan sinar matahari penuh. Namun, dalam cuaca ini, merigold akan mekar dalam waktu yang lebih lama dan kurang produktif. Selain itu, suasana teduh juga membuat marigold rentan mengalami pembusukan yang bisa memengaruhi tunas dan batangnya.<br><br></div><div>4. Pemberian pupuk dapat berfungsi nutrisi bagi bunga merigold agar tumbuh subur karena di dalamnya mengandung nitrogen phosphorus atau fosfor, dan kalium alias NPK yang memang bagus untuk tanaman. Waktu pemberian pupuk yaitu 2 minggu sekali.<br><br></div><div>5. Jangan lupa untuk memangkas tanaman yang sudah mati. Cara ini akan meningkatkan penampilan tanaman dan mendorong mereka lebih mekar.<br><br></div><div>6.&nbsp; Keberadaan serangga dan gulma atau tanaman liar disekitar tanaman bunga merigold dapat mengganggu pertumbuhannya.<br><br></div><div>7. Serangan penyakit pada bunga merigold bisa diakibatkan karena bakteri, jamur, dan sebagainya yang bisa merusak bagian-bagian tumbuhan secara perlahan.<br><br></div>'),
(36, 15, 'Hikmah_Tani_bunga_crisan_20221004185711.jpg', 'Bunga Crisan', 30000, 10, '<div>Cara Merawat Bunga Crisan :<br>1. habitat asli bunga krisan adalah dataran yang lebih dingin karena tanaman hias ini tidak bisa tumbuh dengan baik di dataran rendah yang sangat panas. Letakan bunga krisan di tempat yang lebih teduh, namun tetap menerima sedikit penyinaran sinar matahari.&nbsp;<br><br></div><div>2. Jarak penanaman yang tepat akan membuat bunga krisan tumbuh dengan baik karena memperoleh sirkulasi udara yang baik pada setiap tanaman bunga tersebut. Memperhatikan jarak saat menanam bunga krisan juga menghindari terjadinya persaingan antara akar tanaman dalam menyerap air di dalam unsur hara tanah.&nbsp;<br><br></div><div>3. Media tanaman yang bisa menahan air juga dapat menjaga kelembaban lingkungan bunga krisan tersebut agar bisa tumbuh lebih baik.&nbsp; Biasanya suhu yang panas dapat mempercepat penguapan air di media tanam tersebut, sehingga memerlukan media tanam yang lebih besar untuk menahan air.&nbsp;<br><br></div><div>4. Cara menyiramnya pun perlu perhatikan, yakni memberi intensitas air secukupnya saja. Meskipun bunga krisan cenderung menyukai tanah yang lembab, namun jangan sampai memberikan air terlalu banyak, apalagi sampai menggenang di dalam pot. Hal tersebut justru akan membuat bunga krisan lebih cepat busuk dan lama-kelamaan akan mati.&nbsp;<br><br></div><div>5. bunga krisan adalah salah satu tanaman yang memiliki sifat fotoperiode yang artinya membutuhkan sinar matahari penuh untuk bisa mekar dan berbunga secara sempurna.&nbsp;<br><br></div><div>6. memperhatikan suhu dan kelembaban di sekitar tanaman hias ini karena karakteristiknya yang&nbsp; lebih cocok tumbuh di tempat yang lebih sejuk atau cenderung dingin. Bunga krisan juga bisa bertahan hidup lebih lama di daerah dingin atau datang tinggi. Untuk menanganinya, bisa melakukan perlindungan ekstra pada akar dan mahkotanya. Sedangkan pada daerah yang beriklim hangat dapat menyebabkan bunga krisan lebih lambat berbunganya,terutama malam hari yang mengalami perubahan suhu menjadi lebih dingin. Kondisi suhu yang tidak stabil tersebut dapat membuat kuncup bunga krisan berbentuk tidak teratur. Hal ini membuktikan bahwa suhu dan kelembaban memang sangat berpengaruh pada pertumbuhan bunga krisan.<br><br></div><div>7. untuk kesuburan tanaman hias ini adalah pemberian pupuk 2 minggu sekali yang tepat dan dilakukan secara rutin.&nbsp;<br><br></div><div>8. membebaskan bunga krisan dari hama dan gulma adalah dengan cara memberikan nutrisi pada tanaman hias tersebut, menjaga kualitas media tanam, memindahkan pot atau wadah tanaman secara rutin, memangkas rumput liar dan menjaga kebersihan lingkungan sekitarnya.&nbsp;<br><br></div><div>9. Melakukan repotting mungkin banyak disepelekan orang saat merawat tanaman hias, termasuk bunga krisan yang tumbuhnya lebih cepat. Padahal mengganti pot secara rutin dapat menjaga kestabilan pertumbuhan bunga krisan agar lebih optimal.<br><br></div>'),
(37, 26, 'Bagja_Tani_tanaman_hias_aglaonema_20221004182154.jpg', 'Aglaonema', 40000, 10, ''),
(38, 26, 'Bagja_Tani_tanaman_hias_brokoli_20221004182550.jpg', 'Tanaman Hias Brokoli', 10000, 10, ''),
(39, 26, 'Bagja_Tani_mawar_20221004183506.jpg', 'Mawar', 15000, 10, ''),
(40, 26, 'Bagja_Tani_bunga_aster_20221004183715.jpg', 'Aster', 25000, 10, ''),
(41, 26, 'Bagja_Tani_bunga_kertas_20221004183856.jpg', 'Bunga Kertas', 100000, 10, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id_ins` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat_toko` text NOT NULL,
  `lat` varchar(25) NOT NULL,
  `lng` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cover` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id_ins`, `id_user`, `nama_instansi`, `nama_pemilik`, `alamat_toko`, `lat`, `lng`, `no_telp`, `email`, `cover`, `deskripsi`, `status`) VALUES
(9, 4, 'Sanggar Bunga Zennie Jingga', 'Bpk Didi Juhadi', 'Jln Desa Andir Kec.Jatiwangi Kab.Majalengka', '-6.7597137', '108.2692319', '081221500884', NULL, 'IMG202111241136436.jpg', 'Buka Pkl 07.00-17.00 (Setiap Hari)', 1),
(10, 5, 'A.JE.SAKA', 'Bpk JeJe', 'jln.pangeran muhammad Blok sawah lega desa salagedang kec.Sukahaji kab.Majalengka', '-6.7975872', '108.3053097', '085223190289', NULL, 'IMG-20211204-WA00392.jpg', 'Buka Pada pkl 07.00- Tutup pkl 17.00 ( Buka Setiap Hari).', 1),
(11, 6, 'Resa Flora', 'Bpk Resa', 'Jln Desa Andir Kec.Jatiwangi Kab.Majalengka', '-6.736918', '108.261698', '085295811090', NULL, '20230506122236_Resa_Flora.jpg', 'Buka Pkl 07.00-17.00 (Setiap Hari)', 1),
(14, 7, 'BeePark Argalingga', 'Ibu Hj.Eli', 'Desa Argalingga Kec.Argapura Kab.Majalengka ', '-6.8968125', '108.3568432', '085159770067', NULL, '20230506122359_BeePark_Argalingga.jpg', 'Buka pada hari selasa s/d minggu pada pukul 09.00 - tutup pukul 17.00', 1),
(15, 8, 'Hikmah Tani', 'Bpk Alif', 'jln.pangeran muhammad Blok sawah lega desa salagedang kec.Sukahaji kab.Majalengka', '-6.7980098', '108.3084003', '085879043733', NULL, 'IMG-20211204-WA00385.jpg', 'Buka pkl 07.00-17.00 (Setiap Hari)', 1),
(16, 9, 'Zayanti Green House', 'Bpk Abdul Mutolib', 'Jln. Raya Siliwangi-Panenjoan Kec.Panyingkiran kab.Majalengka', '-6.8103927', '108.1883694', '081313262200', NULL, 'IMG-20211204-WA0049.jpg', 'Buka Pkl 07.00-17.00 (Setiap Hari)', 1),
(25, 25, 'Nur Sari Florist Cemplang', 'Bpk Maman', 'Jl.Raya Cemplang Kec.Rajagaluh Kab.Majalengka', '-6.7985781', '108.3271766', '085224624669', NULL, '20230506122437_Nur_Sari_Florist_Cemplang.jpg', 'Buka Pkl 08.00 - 16.00 (setiap hari)', 1),
(26, 14, 'Bagja Tani', 'Bpk Edi Suryadi', 'Jl.Raya Jatipamor, Banjasari, Blok Desa, Kec.Cikijing, Kab.Majalengka', '-7.0092601', '108.3482295', '6281573162484', NULL, '20220824224213_Bagja_Tani.jpg', 'Buka Pkl 08.00 - 17.00 (setiap hari)', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `id_mtp` int(11) NOT NULL,
  `id_ins` int(11) NOT NULL,
  `nama_mp` varchar(50) NOT NULL,
  `nomor_rek` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`id_mtp`, `id_ins`, `nama_mp`, `nomor_rek`) VALUES
(3, 26, 'BRI', '12345'),
(4, 26, 'BNI', '6789'),
(5, 16, 'BRI', '32423234234'),
(7, 16, 'BNI', '2343243');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_item_order`
--

CREATE TABLE `t_item_order` (
  `id_item` int(11) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_bunga` int(11) NOT NULL,
  `jumlah_dipesan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_komentar`
--

CREATE TABLE `t_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_parent_komentar` int(11) NOT NULL,
  `id_ins` int(11) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `id_order` int(11) NOT NULL,
  `waktu_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL,
  `id_ins` int(11) NOT NULL,
  `total_pembayaran` int(11) NOT NULL,
  `type_payment` enum('Cash','Transfer') DEFAULT NULL,
  `bank` varchar(50) DEFAULT NULL,
  `bukti_transfer` text DEFAULT NULL,
  `expired` datetime NOT NULL,
  `status_order` enum('proses','berhasil','pending','dibatalkan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `no_telp_user` varchar(15) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `email_user`, `no_telp_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'desa gandu kec.dawuan kab.majalengka', 'deajuwitasuwardi@gmail.com', '0895383169273', 'deajuwita', '0794354b9ad93af06562b5d85e1be24f', 1),
(4, 'Bpk Solehudin', 'Jln Desa Andir Kec.Jatiwangi Kab.Majalengka', '-', '081221500884', 'jingga', '1f08ce2f4af61ccee8fe9b52cd8428df', 2),
(5, 'Bpk Jeje', 'jln.pangeran muhammad Blok sawah lega desa salagedang kec.Sukahaji kab.Majalengka', '-', '085223190289', 'ajesaka', 'ea4224699de3a9c02faa313789516a0e', 2),
(6, 'Resa Flora', '', '', NULL, 'resaflora', 'bd2f35010bcd06f6cb325f74949f55ac', 2),
(7, 'Ibu Hj Eli', 'Desa Argalingga Kec.Argapura Kab.Majalengka', '-', '082318370726', 'beepark', '0882202a2b4d8d448ddae47e946f75fa', 2),
(8, 'Bpk Alif', 'salagedang', '-', '085879043733', 'hikmahtani', 'f4511600fe0d72f404d129cf36331494', 2),
(9, 'Abdul Mutolib', ' Jln. Raya Siliwangi-Panenjoan Kec.Panyingkiran kab.Majalengka', 'abdul_mutolib@gmail.com', '081313262200', 'zayanti', '74d1f224414753246f72069201e9930f', 2),
(14, 'Edi Suryadi', 'Jl.Raya Jatipamor, Banjasari, Blok Desa, Kec.Cikijing, Kab.Majalengka', 'edi_suryadi@gmail.com', '0815 7316 2484', 'bagjatani', 'cc50b6bb5afa3356e4195777437e0a3c', 2),
(25, 'Bpk Maman', 'jln raya cemplang kec. rajagaluh kab. majalengka', '-', '085224624669', 'nursari', '3974e7ab457b1a3f912e430c101a4d1e', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bunga`
--
ALTER TABLE `bunga`
  ADD PRIMARY KEY (`id_bunga`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_ins`);

--
-- Indeks untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`id_mtp`),
  ADD KEY `id_ins` (`id_ins`);

--
-- Indeks untuk tabel `t_item_order`
--
ALTER TABLE `t_item_order`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_bunga` (`id_bunga`);

--
-- Indeks untuk tabel `t_komentar`
--
ALTER TABLE `t_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_ins` (`id_ins`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bunga`
--
ALTER TABLE `bunga`
  MODIFY `id_bunga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_ins` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `id_mtp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_item_order`
--
ALTER TABLE `t_item_order`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_komentar`
--
ALTER TABLE `t_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_order`
--
ALTER TABLE `t_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
