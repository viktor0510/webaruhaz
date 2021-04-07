-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 07. 17:34
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `webaruhaz`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `azonosito` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(255) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`azonosito`, `email`, `jelszo`) VALUES
(1, 'admin_viktor@gmail.com', '192837465'),
(2, 'admin_klara@gmail.com', '546372819');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `id` int(11) NOT NULL,
  `email_cim` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `felhasznalo_nev` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `megjegyzes` varchar(500) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`id`, `email_cim`, `felhasznalo_nev`, `jelszo`, `megjegyzes`) VALUES
(1, 'valaki@valami.hu', 'valaki10', '654321', ''),
(2, 'ujvagyok@gmail.com', 'ásvány05', '987654321', ''),
(3, 'konyvek@citromail.hu', 'fürge', 'Juhok', '');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kategoria`
--

CREATE TABLE `kategoria` (
  `kategorianev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `kategoriaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `kategoria`
--

INSERT INTO `kategoria` (`kategorianev`, `kategoriaid`) VALUES
('Fantasy', 1),
('Sci-fi', 2),
('Romantikus', 3),
('Thriller', 4),
('Humor', 5),
('Gyerek', 6),
('Kaland', 7),
('Horror', 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `konyvek`
--

CREATE TABLE `konyvek` (
  `id` int(11) NOT NULL,
  `cim` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `iro` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `ar` int(5) NOT NULL,
  `megjelenes` date NOT NULL,
  `tartalom` varchar(5000) COLLATE utf8_hungarian_ci NOT NULL,
  `kep` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `isbn` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `kategoriaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `konyvek`
--

INSERT INTO `konyvek` (`id`, `cim`, `iro`, `ar`, `megjelenes`, `tartalom`, `kep`, `isbn`, `kategoriaid`) VALUES
(26, 'Tüskék és rózsák udvara', 'Sarah J. Maas', 3700, '2016-10-08', 'Amikor a tizenkilenc éves Feyre az erdőben vadászva megöl egy farkast, nyomban egy másik szörnyeteg bukkan fel, hogy jóvátételt követeljen tőle. Magával hurcolja a lányt egy baljós és mágikus vidékre, amit ő csak a legendákból ismer. Feyre hamar rájön, hogy fogvatartója valójában nem állat, hanem Tamlin, egyike azoknak a halálos és halhatatlan tündéreknek, akik egykor a világ felett uralkodtak.\r\nTamlin birtokán Feyre jéghideg gyűlölete forró szenvedéllyé alakul át, és ez az érzés felperzsel minden hazugságot és figyelmeztetést, amit korábban a tündérek veszedelmes világáról hallott. Azonban a birodalom felett egyre nő egy ősi, gonosz árnyék és a lánynak kell megtalálnia a módját, hogy feltartóztassa vagy örök pusztulásra ítélje Tamlint és világát.', 'Tüskék és rózsák udvara.jpg', '9789633996751', 1),
(27, 'Alkonyat', 'Stephenie Meyer', 3000, '2005-10-05', 'Forks fölött mindig felhős az ég. Bella Swan, az érzékeny, zárkózott lány afféle önkéntes száműzetésre ítéli magát, amikor ide költözik apjához. Bella alapjáraton is mágnesként vonzza a bajt, ezúttal azonban nem csak a \"mindennapi\" csetlések-botlások fenyegetik. Hanem Ő... Ő, akinek aranyszín szeme van, titokzatos, szeszélyes, kiszámíthatatlan, félelmet keltő és biztonságot sugárzó. Ő, akit Edwardnak hívnak, mint valami ódivatú regény hősét. Ő, aki megmenti az életét. Ő, aki mégis a legnagyobb veszélyt jelenti Bella számára. Az indián rezervátumban furcsa, félelmetes mesék keringenek. És egy nap a legenda megelevenedik... A szerzőről: Stephenie Meyernek már nálunk is kultusza van, noha ez az első magyarul megjelenő könyve. Alkonyat (Twilight) című regényével üstökösként robbant be az amerikai irodalmi elitbe úgy, hogy közben tinédzserek és felnőttek millióit hódította meg. Twilight - A földkerekségen mostantól az Alkonyat a szerelem napszaka!', 'Alkonyat.jpg', '9789639708952', 1),
(29, 'Harry Potter és a bölcsek köve', 'J. K. Rowling', 3690, '2019-11-13', 'Harry, a kifosztott árva ekkor belép abba a világba, amelyhez szülei is tartoztak, hogy megküzdjön azzal a Ki-Ne-Mondd-A-Nevét sötét erővel, amely árvává tette. Harry kiválasztott, homlokán a jegy, de egyben közönséges nebuló is, akinek minden kiválasztottsága ellenére fel kell mutatnia valamit, esetünkben kiemelkedő sportteljesítményt és kellő csapatszellemet, hogy elnyerje az egyszerű diáktársat megillető tiszteletet, és megússza valahogy a vizsgáit. A Gonosz Erőt nem könnyű legyőzni, de egy elitiskola hierarchiájában kiküzdeni valami helyet, főként, ha az alsóbbrendű muglik között nevelkedett az ember, és mit sem tud a magasabb bűbájról, az még nehezebb.', 'Bölcsek Köve.jpg', '9789633243015', 1),
(30, 'Dűne', 'Frank Herbert', 4990, '2019-11-26', 'Az univerzum legfontosabb terméke a fűszer, amely meghosszabbítja az életet, lehetővé teszi az űrutazást, és élő számítógépet csinál az emberből. Az emberlakta világokat uraló Impériumban azé a hatalom, aki a fűszert birtokolja. A Padisah Császár, a bolygókat uraló Nagy Házak, az Űrliga és a titokzatos rend, a Bene Gesserit kényes hatalmi egyensúlyának, a civilizáció egészének záloga, hogy a fűszerből nem lehet hiány. Ám ez az anyag csak egy helyen található, a sivatagos, kegyetlen Arrakison, amelyet lakói, a vad fremenek csak úgy ismernek: Dűne.', 'Dűne.jpg', '9789634069034', 2),
(31, 'Éhezők Viadala', 'Suzanne Collins', 3480, '2008-09-14', 'Életben tudsz maradni egy olyan vadonban, ahol mindenki az életedre tör? Észak-Amerika romjain ma Panem országa, a ragyogó Kapitólium és a tizenkét távoli körzet fekszik. A Kapitólium kegyetlenül bánik Panem lakóival: minden évben, minden körzetből kisorsolnak egy-egy tizenkét és tizennyolc év közötti fiút és lányt, akiknek részt kell venniük Az Éhezők Viadalán. Az életre-halálra zajló küzdelmet élőben közvetíti a tévé. A tizenhat éves Katniss Everdeen egyedül él a húgával és az anyjával a Tizenkettedik Körzetben. Amikor a húgát kisorsolják, Katniss önként jelentkezik helyette a Viadalra, ez pedig felér egy halálos ítélettel. De Katniss már nem először néz farkasszemet a halállal - számára a túlélés a mindennapok része. Ha győzni akar, olyan döntéseket kell hoznia, ahol az életösztön szembe kerül az emberséggel, az élet pedig a szerelemmel.', 'Éhezők viadala.jpg', '9786155049675', 1),
(32, 'Éjszárny', 'Ed McDonald', 3680, '2018-10-05', 'A széttört és szenvedő égbolt alatt terül el a Kárhozat végtelen és fertőzött sivataga, a halhatatlan Mély Királyai ellen vívott könyörtelen háború sötét mementója. A féktelen pusztítás lassan száz éve ért véget, amikor a Birodalom bevetette a Nall-gépezetet, az ismert világ leghatalmasabb fegyverét. Legyőzni azonban nem sikerült vele a királyokat, csupán kordában tartani - a mostanra romlott mágiával és vérszomjas démonokkal teli pusztaságban a halhatatlan uralkodók nagyon is éberek. Csak a megfelelő pillanatra várnak.\r\n\r\nA fejvadász Ryhalt Galharrow jól ismeri a Kárhozatot. Amikor a hollót ábrázoló tetoválása életre kel, hogy előadja sürgető üzenetét, Galharrow az Éjszárnyakként ismert csatlósaival egy titokzatos nemesasszony keresésére indul az egyik távoli helyőrségbe. Egyikük sincs azonban felkészülve arra, amit ott találnak: a Mély Királyai nem félik többé a Nall-gépezetet, és óriási seregükkel megindulnak a Birodalom felé. Az egyetlen reményt egy rég halott varázsló öröksége jelentheti, ám az Éjszárnyak ideje fogytán van.', 'Éjszárny.jpg', '9789634194552', 1),
(33, 'Eragon', 'Christopher Paolini', 5000, '2019-11-14', 'Az árván maradt, apjáról mit sem tudó Eragont nagybátyja neveli egy eldugott faluban. A tizenöt éves fiú (éppen ennyi volt a szerző is, amikor elkezdte írni a könyvet) egy éjszaka, vadászat közben tükörsimára csiszolt, rejtélyes kék követ talál, amely utóbb sárkánytojásnak bizonyul, és egy kék sárkány kel ki belőle. Ezzel Eragon élete egy csapásra megváltozik. Mint a sárkány gazdája, a Lovasok rendjébe emelkedik. A legendás Sárkánylovasok előző nemzedéke elpusztult a gonosz és rettentő mágusi hatalommal bíró Galbatorix király elleni harcban. Most az egyszerű falusi sihederre hárul a feladat, hogy megszabadítsa országát a kegyetlen zsarnokságtól. Segítője Saphira, a nőnemű sárkány, akivel gondolatátvitel útján kommunikál, és Brom, a rejtélyes öregember, a múlt titkainak tudója, aki a varázsláshoz is ért. Hosszú út áll előtte, tele izgalmakkal és felfedezésekkel - egy olyan világban, amelyet Tolkien könyveiből ismerhetünk, de amely friss életre támad, új vonásokkal gyarapodik, és egy szeretni való fiatal hőssel ajándékoz meg bennünket a kitűnő kamasz, Christopher Paolini könyvében.', 'Eragon.jpg', '9789635041367', 1),
(34, 'Gideon, a Kilencedik', 'Tamsyn Muir', 4995, '2019-09-10', 'A Császárnak nekromanták kellenek.\r\nA Kilencedik Ház halottidéző hercegnőjének pedig egy rettenthetetlen kardforgató.\r\nGideonnak van egy jó kardja, pár izgi szexlapja, meg a hócipője, ami megtelt már az élőholt rendek baromságaival.\r\nA lovaglány ugyanis eddigi életét halottimádó apácák,csontvázszolgák és ősöreg szektások között töltötte, így bármire hajlandó lenne,hogy végre kiszabadulhasson a rendház szolgaságából és beállhasson a Dominicus naprendszer Császárának fényes seregébe. Úrnője és egyben gyermekkorának megkeserítője azonban csak egyetlen feltétellel hajlandó útjára engedni...\r\nHarrowhark Nonagesimus, a Kilencedik Ház páratlan csontmágusboszorkánya rendkívüli küldetés előtt áll. A Császár valamennyi Ház örökösét halálos próbatételre szólította, amelyhez minden tudásukra, erejükre és ravaszságukra szükségük lesz. Na, meg egy-egy tehetséges lovagra. Amennyiben Harrow kiállja a próbát, a Feltámadás halhatatlan, nagyhatalmú szolgájává emelkedik, azonban, ha az ő képességei és bajnoka, Gideon pengéje kevésnek bizonyul, a Kilencedik Házra biztos pusztulás vár.\r\nPersze, jól tudjuk, hogy a halál nem feltétlenül az út vége.', 'Gideon, a Kilencedik.jpg', '9789634701521', 2),
(35, 'Gyűrűk Ura', 'J. R. R. Tolkien', 12350, '2020-07-29', 'Tolkien képzelete szabadon, ráérősen kalandozik a könyv három vaskos kötetében -- vagyis abban a képzelt időben, mikor a világ sorát még nem az ember szabta meg, hanem a jót és szépet, a gonoszat és álnokot egyaránt ember előtti lények, ősi erők képviselték. Abban az időben, mikor a mi időszámításunk előtt ki tudja, hány ezer, tízezer esztendővel a Jó kisebbségbe szorult erői szövetségre léptek, hogy a Rossz erőit legyőzzék: tündérek, féltündék, az ősi Nyugat-földe erényeit őrző emberek, törpök és félszerzetek, erdő öregjei fogtak össze, hogy a jó varázslat eszközével, s a nagy mágus, Gandalf vezetésével végül győzelmet arassanak, de épp e győzelem következtében elenyésszen az ő idejük, s az árnyak birodalmába áthajózva átadják a földet új urának, az emberfajnak.', 'Gyűrűk Ura.jpg', '9789634058397', 1),
(36, 'Metró - A trilógia', 'Dmitry Glukhovsky', 8000, '2020-12-23', 'Az egész világ romokban hever.\r\nMoszkva szellemvárossá változott, megmérgezte a radioaktív sugárzás, és szörnyek népesítik be. A kevés életben maradt ember a moszkvai metróban bújik meg - a föld legnagyobb atombombabiztos óvóhelyén. Az alagutakban sötétség honol és borzalom fészkel.\r\nArtyomnak az egész metróhálózaton át kell jutnia, hogy megmentse a szörnyű veszedelemtől az állomását, sőt talán az egész emberiséget. De hogyan tudja majd eldönteni, hogy hőstettet követ-e el vagy óriási hibát?', 'Metró - A trilógia.jpg', '9789635040179', 2),
(37, 'Oculus', 'A.M. Aranth', 3995, '2019-11-14', 'Mit tennél, ha tudnád, hogy egy napon elveszíted a nevedet, a családodat, a barátaidat, a\r\njogaidat és jó pénzért egy vak Idős tudós mellé adnak oculusnak, hogy helyette láss és a nap\r\nharminckét órájából huszonhatban mikroszkópba bámulj?\r\nItt, Avalonon így megy. Nincs menekvés, akkor se, ha emiatt őrült szektások vadásznak rád,\r\nmegutál a legjobb barátod, és elszaporodnak a vágások a csuklódon... Itt ez a rend.\r\nA nevem Truth Dunn volt. Már nem vagyok ember. Nem vagyok személy. Csak oculus.\r\n\r\nMit tennél, ha tudnád, hogy a legjobb barátod, egy lány, akit mindennél jobban szeretsz,\r\nrabszolga lesz? Végig tudnád nézni, ahogy tönkremegy? Hogy lassan megfojtja a rendszer?\r\nAz én válaszom egyszerű. Én megpróbálnám kiszabadítani. Akkor is, ha nem akarja. Akkor\r\nis, ha nyakig véres leszek közben. Akármit is kelljen tennem.\r\nA nevem Aoi Kane. És én nem fogadom el, hogy itt ez a rend.\r\n\r\nMit tennél, ha tudnád, hogy az Ellenséged, az, akinek a levadászására mindent feltettél, ott\r\nbujkál az orrod előtt? Hogy még csak nem is tudja, hogy a világon vagy, és mérgezett\r\nnyílvesszőként rohansz felé?\r\nÉn nem várok. Lecsapok rá, és eltaposom, ahogy érdemli. Bele sem gondolok, hogy mit ránt\r\nmagával a semmibe.\r\nA nevem nem számít. Mától pedig én vagyok itt a rend.', 'Oculus.jpg', '9789634701187', 2),
(38, 'Vaják I', 'Andrzej Sapkowski', 3990, '2021-01-08', 'Geralt a vajákok közé tartozik: mágikus képességeinek köszönhetően, amelyeket hosszan tartó kiképzése és egy rejtélyes elixír csak még tovább csiszolt, zseniális és könyörtelen harcos hírében áll. Ugyanakkor nem hétköznapi gyilkos: célpontjai vérszomjas szörnyetegek és aljas fenevadak, amelyek mindenütt hatalmas pusztítást végeznek, és megtámadják az ártatlanokat.\r\nHiába tűnik azonban valami gonosznak vagy jónak, nem biztos, hogy valóban az - és minden mesében van egy csipetnyi igazság.\r\n', 'Vaják I.jpg', '9789635660346', 1),
(39, 'Varázslók', 'Lev Grossman', 3590, '2015-08-05', 'A többi fiatalhoz hasonlóan Quentin Coldwater sem hisz a varázslatokban egészen addig, míg egy zártkörű és titkos egyetem hallgatója nem lesz New York egy eldugott részében. S noha a tanulás évei úgy telnek, mint bárhol máshol barátokra tesz szert, rendszeresen lerészegedik, majd idővel lefekszik valakivel, akibe beleszeret , a titkos tudás örökre megváltoztatja őt. Kitűnően sajátítja el a modern varázstudományt, ám a szíve mélyén mindig is vágyott nagy kalandot és boldogságot nem kapja meg hozzá. Egy nap a barátaival azonban felfedeznek valami hatalmasat, ami mindent megváltoztathat.', 'Varázslók.jpg', '9786155522536', 1),
(40, 'Vér éneke', 'Anthony Ryan', 4745, '2014-05-31', 'Vaelin Al Sorna apja legfőbb hadúr az Egységes Királyság uralkodójának szolgálatában. Mindössze tízéves fiát magára hagyja a Hatodik Rend kolostorának vasrácsos kapujánál. A Rendben árva gyermek módjára nevelkedő és jogos örökségétől megfosztott fiú meggyűlöli apját.\r\nA rendtestvérek Vaelint és társait kegyetlen kiképzésnek vetik alá, ahol a sikertelenség következménye sokszor a halál. Megtanulnak viszont lovakkal bánni, kardpengét kovácsolni, életben maradni a vadonban, és nem utolsósorban embert ölni. Társául egy taszító küllemű, ám annál vérszomjasabb kutya és egy meglehetősen szeszélyes természetű ló szegődik, aki hősünket tűri meg legkevésbé a hátán.\r\nEkkor kezd el munkálni benne a vér éneke, egyfajta különleges képesség, amely segíti és vezérli útja során.\r\nMiután kiképzése véget ér, a hírnevet és rengeteg sebet szerzett fiú a király befolyásának hálójába kerül, Hite és lelkiismerete ellenére, képességei végső határát feszegetve. Az őrült vagy lángész Janus király által kirobbantott igazságtalan háborúban tipródva Vaelin próbál az őt övező gyűlölet ellenére minél többeket megóvni, függetlenül attól, melyik oldalon állnak. Uralkodója hódítani küldte, de számol-e a háttérben munkálkodó erőkkel és Vaelin igazi céljaival?', 'Vér Éneke.jpg', '9789639861640', 1),
(41, 'Vörös Nővér', 'Mark Lawrence', 4745, '2017-03-19', 'A Kegyes Irgalom Kolostorában fiatal lányokat képeznek gyilkosokká. Némelyik gyermekben kiütközik az ősi vér, ritka képességekkel ruházza fel őket, amelyeket halálos vagy misztikus erejűvé csiszolnak-edzenek. Ám még a kard és az árnyak mesternői sem fogják fel igazán, milyen kincsre bukkantak, amikor Nona Grey a csarnokaikba került.\r\n\r\nA vérfoltos ruhájú, kilencéves Nonát a bitófa árnyékából ragadják el. Gyilkossággal vádolják, ám ő valami sokkal rosszabbat követett el. Tíz év szükséges ahhoz, hogy a penge és az ököl használatára kitanítsanak egy vörös nővért, ám Üveg apátnő szárnyai alatt sokkal többet el lehet sajátítani pusztán a halál művészeténél. Osztályában Nona új családra - és új ellenségekre - lel.\r\n\r\nBármily biztonságos és elszigetelt is legyen a kolostor, Nona számára nincs menekvés titka és erőszakos múltja elől, amely ezer szállal kötődik a hanyatló birodalom összes sötétségéhez. Érkezése régi viszályokat hív újra életre, kegyetlen küzdelmeket szít az egyházon belül, és még a császár figyelmét is magára vonja.\r\n\r\nMiközben haldoklik a nap, és a jég egyre előbbre nyomul, Nona Greynek úrrá kell lennie belső démonain, hogy azokra szabadíthassa őket, akik az útjába állnak.', 'Vörös Nővér.jpg', '9789634700104', 1),
(42, 'Fekete lapok', 'George R. R. Martin', 3500, '2017-07-07', 'A II. világháború után közvetlenül, mikor az emberiség még alig ocsúdott fel a borzalmakból, idegen eredetű vírus támadja meg a Földet... és különleges tulajdonságokkal ruházza fel a túlélők egy részét. Az ászok emberfeletti mentális és fizikai képességekre tesznek szert. Másoknak csupán bizarr lelki és testi torzulások jutnak - belőlük lesznek a jokerek. A túlélők között vannak olyanok, akik az emberiség szolgálatába állítják képességeiket, mások inkább a gonosz csábításának engednek. A Wild Cards az ászok és a jokerek története, a sorozat első része - ennek a torzult világnak a \"bibliája\" - pedig 1946-tól a 80-as évekig kalauzolja el az olvasót.', 'Fekete lapok.jpg', '9789633101629', 1),
(43, 'Cadia Kitart', 'Justin D Hill', 4690, '2021-03-04', 'Az Iszonyat Szeméből kiözönlő seregek folyamatos ostroma alatt álló Cadia bástyaként dacol a zsarnoksággal és a halállal. Seregei és erődjei évszázadok óta tartják már féken a Káosz hordáit, most azonban ütött komor dacosságuk órája. Miközben Abaddon Tizenharmadik Fekete Hadjárata az erődvilágra zúdul az Impérium seregei pedig megérkeznek, hogy megerősítsék ezt a létfontosságú világot, bevégeztetik egy régóta zajló iszonyatos rituálé is, mely egyszer s mindenkorra felborítja a brutális háború kényes erőegyensúlyát... A sötétség óráján azonban színre lép egy igazi hős, Ursakar Creed kasztellán nagyúr, hogy a reményvesztett védők élére álljon, de vajon elég lesz-e az Astra Militarium páncélos öklének súlya és az Adeptus Astartes harcosainak ereje, hogy meggátolja a katasztrófát és megmentse a Cadiát? Míg Creed él, a remény is él. Míg akár egyetlen védő szíve is dobban, a Cadia kitart... de meddig még?', 'Cadia Kitart.jpg', '9786156075482', 2),
(44, 'Itt és most és aztán', 'Mike Chen', 3790, '2021-03-16', 'Kin Stewart átlagos családapa: informatikával foglalkozik, a mindennapok apró-cseprő gondjaival küzd, és próbál jóban lenni tinédzser lányával, Mirandával. Valójában azonban időutazó titkos ügynök a jövőből, aki az 1990-es években rekedt egy küldetés során.\r\n\r\nMúltját titkolva új életet kezdett, ám időről időre emlékezetkieséssel járó\r\nrosszullétek törnek rá, és ezek megzavarják a családi nyugalmat. Egy délután megérkezik a \"mentő\" csapat - tizennyolc év késéssel. Küldetésük: visszavinni őt 2142-be, ahol valójában csak hetek teltek el, és ahol egy másik család várja, amire nem emlékszik. A két történet között őrlődő Kin kétségbeesetten igyekszik fenntartani a kapcsolatot múltbeli és jelenbeli életével egyaránt. De amikor bizonyos lépései azzal fenyegetnek, hogy elpusztulhat az Időfelügyelő Ügynökség, megváltozhat a történelem, és lánya élete is veszélyben forog, vállalkoznia kell egy utolsó útra Miranda megmentése érdekében, még akkor is, ha ezzel megsérti az időutazás összes szabályát.\r\n\r\nAz Itt és most és aztán kivételes sci-fi, melyben a szerző egyszerre képes elkápráztatni játékos fantáziája, képzelőereje sokszínűségével, ugyanakkor megmutatja az apai szeretet mindent elsöprő erejét is. Hiszen, ha egy férfi számára a lánya élete a tét, nem ismer határt sem térben, sem időben... ', 'Itt és most és aztán.jpg', '9789635510436', 2),
(45, 'Hátha', 'Vámos Anna', 3790, '2020-12-04', 'Különleges könyv, különleges műfaj:\r\nhumoros, hangulatjavító közérzetrajzok és rövid szövegek.\r\n\r\nA szerző így ír a könyvéről: \"2020 elején úgy döntöttem, hogy kész, elegem van a szorongásaimból. Elkezdtem leírni és lerajzolni ezeket a gondolatokat. Minden nap legalább egyet. Ettől egy idő után megnyugodtam. Hurrá, győztem!\r\nNem sokkal később mindenfelé elterjedt a Covid, és az egész világ elkezdett egyszerre szorongani.\r\nDe nem csak erről szól ez a könyv. Mert az élet járványok idején is megy tovább. Vannak jobb napok, vannak rémesek és idegesítőek is.\r\nÉn pedig rajzolok tovább.\r\nAlapvetően optimista vagyok.\"\r\n\r\nVámos Anna Londonban él, egy társsal, egy gyerekkel és elképesztően sok színes lénnyel a fejében.', 'Hátha.jpg', '9786155640476', 5),
(46, 'SzivaTáska', 'Pepe Canalejo', 2300, '2020-10-08', 'A SzivaTáska mindenkié. Kolumbiaié, aki ellopta, aztán elveszítette. Tolvaj Ramóné és Tökfej Paquitóé, akik rátaláltak és eldugták. Juergator bácsié, aki elvitte. Juergator bácsi unokájáé, Tomátomáé, aki szívesen elköltené a benne lévő pénzt.', 'SzivaTáska.jpg', '9786155992483', 5),
(47, 'Felelős alkoholista', 'Bálint Ferenc', 4000, '2020-11-04', 'Hogyan éli meg egy humorista a bezártságot, és milyen az, amikor egy járvány közepén, fellépések híján, tudatosan menekül az alkoholizmusba? Milyen módszerrel tudjuk a saját testsúlyunk többszörösét hazavinni borból? Hogyan keveredik egy pacifista kocsmai verekedésbe? Miért kell megfenyegetni egy fitneszgurut? Mi a baj a gravitációval? Hány sör nem sör?\r\nAz olvasó az év legviccesebb túlélési tanácstárát tartja a kezében, egy intim naplót, ami a végén szerves egésszé lesz, és szerencsére nem hal meg a főhős.\r\nBálint Ferenc a Szomszédnéni Produkciós Iroda humortársulat tagja, a Dumaszínház és a Showder Klub fellépője, 2014-ben kapott Karinthy-gyűrűt.', 'Felelős alkoholista.jpg', '9786156145710', 5),
(48, 'Csillagfényes utazás', 'Virginie Grimaldi', 3790, '2020-08-24', 'Mit tesz egy teljesen eladósodott, harminchét éves, kétgyerekes pincérnő, ha elveszíti a munkáját, de végkielégítésként egy nagyobb összeghez jut? Kifizeti a tartozásait, hogy megmentse a lakását, és keres egy új állást? Anna, aki mindig is biztonsági játékos volt, erre készül, ám valami azt súgja neki, hogy ez a legrosszabb, amit tehet. Hiszen a sok munka miatt évek óta alig látja a lányait, a tizenhét éves Chloét és a tizenkét éves Lilyt, akik küszködnek az iskolával, a szerelemmel, és mind anyjuktól, mind egymástól eltávolodtak. Márpedig Annának semmi sem fontosabb a gyerekeinél. Ezért mindenki legnagyobb döbbenetére úgy dönt, hogy kölcsönkéri apja új lakóautóját, és hármasban nekivágnak, hogy körbeutazzák Skandináviát. A gyerekek meg vannak róla győződve, hogy anyjuknak \"elgurult a gyógyszere\", ám ahogy telik az idő, az Annában beállt változás rájuk is hatni kezd. Az északi fénnyel, fjordokkal, erdőkkel és kalandokkal teli úton új barátok, új élmények és új érzések várják őket, amelyeknek tükrében hátrahagyott életük is egészen más színben tűnik fel.\r\n\r\nA Csillagfényes utazás finom humorral mesél a bátorságról és a feltétel nélküli szeretetről. Megmelenget, elgondolkoztat, és reményt nyújt akkor is, ha körülöttünk olyan hideg szelek fújnak, akár az északi sarkkörön. ', 'Csillagfényes utazás.jpg', '9789633247976', 5),
(49, 'Vízenjárók', 'Medveczky Balázs', 3700, '2019-11-25', 'Igaza annak van, akinek adnak. Csikóhal tisztában van ezzel és azzal is, hogy ingyen viszont nem adnak semmit. De mivel nincs egy árva gyöngye, úgy kavarog a törzsfőnök Szürke Bálna, a vízenjáró Toronycsiga, a lándzsásokat vezető Fehér Cápa és a bűnözést életvitelszerűen űző piranhák hatalmi játszmáinak forgószelében, mint egy könnyű kis falevél. Rendre a Kajmánok szigetén köt ki, hogy letöltse a rá kiszabott büntetéseket, és az élete nem több, mint örökös menekülés a hatalmasok és a ragadozók elől. Ám fiatal embereknél előfordul olykor, hogy szerelembe esnek, pedig nem is gazdagok. És ez a megfoghatatlan lélekállapot sokszor képes őket teljesen megváltoztatni. Csikóhal például rájön, hogy az igazáért akár meg is küzdhet. Nos, mit is mondhatnék erre? Nem akarok spoilerezni, de előfordul néha, hogy az ilyesféle harcok megnyerhetők.', 'Vízenjárók.jpg', '9786150057347', 5),
(50, 'Boszorkányvadász', 'Max Seeck', 3700, '2020-08-17', 'Helsinki gazdagok lakta elővárosában holtan találják egy híres író feleségét. A meggyilkolt nő elegáns fekete estélyiben, az arcára fagyott kísérteties mosollyal, magányosan ül az asztalfőn.\r\nAztán a tengerből partra vetődik egy másik áldozat, és a vérfagyasztó bűntettek sorozatának ezzel még nincs vége. Eleinte úgy tűnik, hogy egy bomlott elméjű ámokfutó váltja valóra egy thrillersorozat, a Boszorkányvadászat rituális gyilkosságait. Ám Jessica Niemi nyomozó rádöbben, hogy nem egyetlen bűnözőt keres. Az elkövetők mintha valamiféle fekete mágiának hódolnának, miközben figyelik a felügyelőnő minden mozdulatát - és egy lépéssel mindig előtte járnak. Míg Jessica a különös ügyek megoldásán vívódik, saját múltjának kísértő árnyai sem hagyják nyugodni.', 'Boszorkányvadász.jpg', '9789633247730', 4),
(51, 'Éjszakai műszak', 'Stephen King', 4000, '2020-08-15', '\"...nem tudok úgy elaludni, hogy a lábam kilóg a takaró alól. Mert ha egyszer egy hideg kéz kinyúlna az ágy alól és megragadná a bokámat...\" - írja Stephen King e húsz kiváló elbeszélést tartalmazó kötet előszavában.\r\nA félelem - hiába is tagadnánk - mindannyiunk életében jelen van. Emlékezzünk csak vissza gyerekkori mumusainkra, nyomasztó álmainkra, felnőttkori szorongásainkra. Ezek a félelmek olykor megalapozottak, máskor teljesen irracionálisak, néha elmosódottak, máskor határozott alakot öltenek. Szörnyülködünk, borzongunk az újsághíreken, mégis mohón elolvassuk, hogy \"Agyonverte...\", \"Kútba dobta...\", \"Feltrancsírozta...\" stb.\r\nStephen King a maga mesteri és utánozhatatlan módján formába önti, történetekké kerekíti ezeket az érzéseket, csakhogy e teljességgel modern mesékben nem a vasorrú bába, hanem egy megvadult mosodai gőzvasaló üldözi áldozatát, a hétfejű sárkány helyett életre kelt játék hadsereg indít véres bosszúhadjáratot, netán a fűnyíróember ajánlja fel szolgálatait a kertvárosi ház gyanútlan lakóinak, s nem kell az óriások birodalmába látogatni, megteszi egy sivár országúti pihenő, ahol őrjöngő kamionok hajkurásszák a kávéra betérő fáradt utast, Puhaléptű Jackről már nem is szólva...', 'Éjszakai műszak.jpg', '9789635043071', 4),
(52, 'Hallgass!', 'John Hart', 3990, '2020-08-18', 'Tíz év telt el, amióta az akkor kiskamasz Johnny húga nyomtalanul eltűnt az észak-karolinai mocsárvidéken. A nehéz sorsú fiú az egyik barátjával látott neki a nyomozásnak, ám a húga életét nem tudta megmenteni. Az azóta eltelt évek alatt Johnny és Jack senkinek sem beszéltek arról, mit derítettek ki a halálesetről, és azóta is hallgatnak a történtekről. Johnny önkéntes száműzetésben él, és csak a régi baráttal tartja a kapcsolatot. Ám amikor a környéken újabb hátborzongató események történnek, csak ők tudják, hogy mi lakozik a mocsárban...\r\nGyilkosság, téboly, varázslat, árulás - és egy elszakíthatatlan barátság próbája a misztikus rengetegben, ahol a világ fizikai és spirituális törvényei mintha nem léteznének.', 'Hallgass!.jpg', '9789634524311', 4),
(53, 'Roncs', 'Emily Bleeker', 3300, '2020-11-05', 'Lillian Linden hazudik. Látszólag bátor túlélője egy repülőgép-katasztrófának, azonban hazudik a családjának, a barátainak, az egész világnak, amióta a mentőhelikopterek megtalálták őt és a másik túlélőt, Dave Hallt a Csendes-óceán egy déli, lakatlan szigetén. Csaknem két évvel az eltűnésük után a megmenekülők rivaldafénybe kerülnek, és egyik napról a másikra médiasztárokká válnak. Azonban az igazi történetet nem mondhatják el - tehát hazudnak.\r\n\r\nA közönséget lenyűgözi a szerencsétlenül jártak meséje, Lilliannek és Dave-nek azonban vissza kell térnie a saját életéhez, a házastársához. Genevieve Randall, a jó szimatú újságíró és hírműsorvezető azonban nem hisz nekik. Gyanút fog, hogy Lillian és Dave története a többi túlélőről nem igaz. Elszánja magát, hogy kideríti az igazat, nem számít, hány életet tesz ezzel tönkre.', 'Roncs.jpg', '9789634576945', 7),
(55, 'Tisztító tűz', 'Jens Henrik Jensen', 4500, '2020-07-25', 'A háborús veterán Niels Oxent egy hajóbalesetet követően halottnak könyvelik el. A valóságban azonban Svédország egyik szigetén fedezékbe ásta magát. Kínzó dilemma előtt áll.\r\n\r\nA rejtőzködő, ámde óriási hatalommal rendelkező dán politikai-gazdasági hálózat, a Danehof meg akart szabadulni tőle, és ha most rájönnek, hogy nem jártak sikerrel, ismét megindul ellene a hajsza. Az erőszakos hatalom nem engedheti meg magának az effajta hibát. Ráadásul a dán rendőrség is megpróbálná ráhúzni a vizeslepedőt egy olyan gyilkosságért, amelyet nem követett el.\r\n\r\nA helyzete kilátástalan, Oxen mégis úgy dönt, felveszi a kesztyűt és küzdeni fog. Ha nem tenné, hátralevő életében menekülnie kellene, s akkor minden reménye szertefoszlana, hogy valaha is viszontláthatja a fiát.\r\n\r\nFelkutatja korábbi szövetségesét, a Rendőrségi Titkosszolgálat azóta elbocsátott nyomozónőjét, s Margrethe Franck révén további segítőkre is lel egykori főnökük, Axel Mossman személyében - akit szintén menesztettek a polgári titkosszolgálattól, illetve képbe kerül Mossman unokaöccse is.\r\n\r\nA Danehof elleni küzdelem valamennyiük életét súlyosan megnyomorította. Olyanok, mint a jégbe fagyott lángok, s csak akkor kaphatják vissza saját életüket, ha leszámolnak a láthatatlan ellenséggel, a kegyetlen hatalom rejtőzködő birtokosaival.\r\n\r\nKérdés, hogy mikor szabadul ki végre ez a tisztító tűz ', 'Tisztító tűz.jpg', '9789635441600', 7),
(56, 'Amíg élünk', 'Mats Strandberg', 3790, '2020-03-04', 'A felnőttkor küszöbén állsz, ragyogó nyár van, és látszólag minden olyan, mint máskor. De tudod, hogy közeledik a katasztrófa. Négy hét és öt nap múlva egy üstökös csapódik a Földbe, amit senki sem fog túlélni. Elvégezték az utolsó számításokat, nem maradt semmi kétség.\r\nMihez kezdesz a hátralévő időddel? Kivel szeretnéd tölteni az utolsó pillanatokat? Milyen érzés percre pontosan tudni, hogy mikor halsz meg? Mennyit ér egy emberélet ilyen körülmények között?\r\n\r\nAz Amíg élünk története egy olyan világban játszódik, amelynek meg vannak számlálva a napjai. A főszereplője két magányos tinédzser, akiket egy tragédia hoz össze. De vajon választ kapnak a kérdéseikre, mielőtt elfehéredik az ég, és elpárolognak a tengerek?', 'Amíg élünk.jpg', '9789633247402', 7),
(57, 'Cicamentés', 'Lucy Daniels', 1290, '2021-02-15', 'Anni nemrég költözött a nagymamájához, egy kisvárosba. Szomorú, mert hiányzik a megszokott szobája, a barátai... Ám minden megváltozik, amikor megismerkedik Minkával, akinek a szülei a Noé Állatkórházban dolgoznak. Anni rajong az állatokért, és nagyon szívesen segítene a rendelőben is. De előbb még segítenie kell négy újszülött kiscicának, akik éhesen nyávognak. Vajon hol lehet az anyjuk? A kislány elhatározza, hogy megkeresi őt, mielőtt még késő lenne... Egy nagyszerű sorozat mindenkinek, aki rajong az állatokért!', 'Cicamentés.jpg', '9789634039501', 6),
(58, 'Mindig másnap', 'Kertész Erzsi', 2690, '2021-03-26', 'Ez a nap is úgy indult, mint a többi. Felkelés, reggeli, pakolás, rohanás, indulás az oviba, az iskolába - csakhogy eltűnt a kert, a biciklik, az ismerős táj, helyét burjánzó őserdő veszi körül! De semmi gond! Egy belevaló család előbb-utóbb feltalálja magát! Hiszen bátrak, leleményesek, és rugalmasan kezelik a nehézségeket. Bár ilyen sok meglepetésre talán még ők sincsenek felkészülve...\r\nMár tudsz olvasni? Mit gondolsz, el tudnál olvasni egyedül egy egész regényt? Próbáld meg! A Zseblámpás Könyvek egész biztosan neked valók! Nagy betus, nem túl hosszú, izgalmas és vicces történetek várnak! Készíts be a takaró alá egy zseblámpát is, mert ezeket a könyveket nem fogod tudni letenni!', 'Mindig másnap.jpg', '9789634107507', 6),
(59, 'A legbátrabb jak', 'Lu Fraser', 2500, '2021-01-15', 'Finom, puha, göndör szőrével és aprócska patáival Jakab a legaranyosabb kis jak. De... ő már nem akar kicsi lenni! Nagyon szeretne felnőni, hogy végre olyan lehessen, mint az igazi nagy jakok. De mi van akkor, ha vannak dolgok, amiket csakis a kis jakok tudnak megtenni? Csodálatos, verses történet arról, hogy tökéletesek...', 'A legbátrabb jak.jpg', '9786155781650', 6),
(60, 'Az Elit', 'Kiera Cass', 3490, '2013-11-15', 'A palotába 35 lány érkezett. Csak hatan maradtak.\r\n\r\nA Párválasztót 35 lány kezdte meg. Mostanra azonban már csak az Elitnek nevezett csoport maradt versenyben Maxon herceg szerelméért, s a harc ádázabb, mint valaha. Minél közelebb kerül America a koronához, annál jobban meg kell szenvednie azért, hogy végre megtudja, kihez húz valójában a szíve. Minden Maxonnal töltött pillanat olyan, akár egy tündérmese, csupa lélegzetelállító, csillogó romantikus kaland. De ha a palotában meglátja őrt állni első szerelmét, Aspent, újra hatalmába keríti a vágyakozás az élet után, amit még közösen terveztek el.\r\nAmericának rettentően szüksége lenne egy kis időre. Míg azonban ő a kétféle jövő lehetősége között vergődik, az Elit tagjai pontosan tudják, hogy mit is akarnak - s egyre valószínűtlenebbnek tűnik, hogy Americának lehetősége nyílik választani...', 'Az Elit.jpg', '9789636897277', 3),
(61, 'Mielőtt megismertelek', 'Jojo Moyes', 4000, '2012-01-05', 'Louisa Clark elégedett az életével. Szereti a csendes kisvárost, ahol születése óta él, a munkáját a városka egyik kávézójában. Szereti a családját, a mindig hangos, zsúfolt házat, ahol apjával, anyjával, az Alzheimer-kóros nagyapával, a család eszének tartott nővérével és annak ötéves kisfiával együtt lakik. És talán még Patricket is szereti, a barátját, akivel már hét éve vannak együtt. Egy napon azonban Lou szépen berendezett kis világában minden a feje tetejére áll: a kávézó váratlanul bezár, és hogy anyagilag továbbra is támogathassa a családját, Lou elvállalja egy harmincöt éves férfi gondozását, aki súlyos balesete után depressziósan és mogorván tölti a napjait. Will Traynor gyűlöli az életét. Hogy is ne gyűlölné, amikor egyetlen nap alatt mindent elveszített? A menő állása Londonban, az álomszép barátnője, a barátai, az egzotikus nyaralások - mindez már a múlté. A jelen pedig nem is lehetne rosszabb: nem elég, hogy önállóságától és méltóságától megfosztva vissza kellett térnie a szülővárosába, ebbe az álmos és unalmas városkába, most még egy új gondozót is felvettek mellé, anélkül hogy kikérték volna a véleményét. Az új lány elviselhetetlenül cserfes, idegesítően optimista és borzalmasan felszínesnek tűnik. Lou-nál és Willnél különbözőbb két embert keresve sem találhatnánk. Vajon képesek lesznek-e elviselni egymást, és - pusztán a másik kedvéért - újraértékelni mindazt, amit eddig gondoltak a világról?', 'Mielőtt megismertelek.jpg', '9789632663852', 3),
(62, 'A sötétség fogságában', 'Anne L. Green', 3700, '2015-10-12', 'Andrew Dark egy drogkartell vezetőjeként élvezi a hatalom és a pénz adta lehetőségeket, ám ebben a sötét világban mindennek megvan az ára. Hamar ráébred erre ő is, amikor egy alkalommal hiba csúszik a számításába. Elraboltatja\r\naz áruló embere húgát, a szókimondó és csinos Christine Stuartot. Fogva tartó és túsza között kínzó vágy ébred.\r\nHáttérbe szorulnak a józan, észszerű döntések.', 'A sötétség fogságában.jpg', '9786155692871', 3),
(64, 'A titkos mama', 'Shalini Boland', 2890, '2018-11-28', 'Tessa Markham egy kisfiút talál a konyhájában. A gyerek az édesanyjának gondolja. Tessának azonban nincsenek gyermekei. Már nincsenek. Nem ismeri a kisfiút, fogalma sincs róla, hogy került oda. Miután bejelentést tesz a rendőrségen, meggyanúsítják, hogy ő vitte magával a titokzatos gyermeket. Teresa élete teljesen felbolydul . És akkor a férje elárul neki egy titkot... Teresa nem tudja biztosan, mit higgyen el, vagy kiben bízzon. Valaki ugyanis hazudik. Ahhoz, hogy eljusson az igazsághoz, az asszony kénytelen szembenézni fájdalmas múltjával. Az igazság azonban veszélyesebb, mint gondolná. Az egész élete merő hazugság. Hátborzongatóan lebilincselő, fordulatos pszichológiai thriller A lány a vonaton és a Holtodiglan rajongóinak.', 'A titkos mama.jpg', '0899000362139', 8),
(65, 'Lefelé a folyón', 'Sienna Cole', 3700, '2018-05-08', '2002 májusában a fiatal és mélyen megsebzett Alice Carrington megdöbbentő vallomása végigsöpört az Egyesült Államokon. Addig őrzött titka felbolygatta és felháborította az egész országot. Alice megrettent a felelősség súlyától, és a szökést választotta, de elképzelni sem tudta, hogy tettei\r\n\r\nmilyen események láncolatát indítják el. Olyan sorsokat csomózott össze, melyeknek sosem kellett volna találkozniuk.\r\n\r\nLynn Walker pincérnő Hohenwaldban, egy isten háta mögötti tennesseei településen, és egyetlen célja, hogy valóra válthassa lánya álmait.\r\n\r\nFrank Carrington újságíró és családapa, aki megszállottan küzd gyermeke igazáért.\r\n\r\nJeffrey Mills zseniális tehetséggel megáldott, nehéz sorsú festőművész, akit egy személyes tragédia pályája feladására kényszerített.\r\n\r\nAz egyetlen közös nevező hármuk életében Alice titka.', 'Lefelé a folyón.jpg', '9786155763410', 8),
(66, 'A víz mélyén', 'Paula Hawkins', 3990, '2017-05-02', 'A várost átszelő folyóból holtan húznak ki egy fiatal nőt. Néhány hónappal korábban egy sérülékeny tinédzser lány végezte ugyanott, ugyanígy. Előttük évszázadokon át asszonyok és lányok hosszú sora lelte halálát a sötét vízben, így a két friss tragédia régen eltemetett titkokat bolygat meg - és hoz felszínre.\r\nAz utolsó áldozat árván maradt, tizenöt éves lányának szembe kell néznie azzal, hogy félelmetes nagynénje lett a gondviselője, aki most kényszeredetten tér vissza oda, ahonnan annak idején elmenekült, és ahová szíve szerint soha nem tette volna be újra a lábát. A folyóparti ház eresztékei éjjelente hangosabban nyikorognak, a fal tövében susogó víz kísérteties neszekkel tölti meg az egyébként zavartalan csendet.', 'A víz mélyén.jpg', '9786155638589', 8),
(67, 'A lány akinek nincs múltja', 'Kathryn Croft', 3600, '2018-11-28', 'Évek óta menekülsz a múltad elől. Ma utolér\r\n\r\nLeah Mills úgy él, mint aki örökösen menekül egy borzasztó nap üldözi a múltjából. Magányos, társaságba nem jár, barátai nincsenek. Aztán egy napon, mert oly nagyon vágyik már kapcsolatra, megismerkedik Juliannel. Most először meri elhinni, hogy normális életet élhet.\r\n\r\nÁm annak a bizonyos napnak a tizennegyedik évfordulóján kap egy üdvözlőlapot. Valaki tudja az igazat, tudja, mi történt. És nem fog leállni, amíg szét nem rombolja az életet, amit a fiatal nő felépített.\r\n\r\nDe Leah valóban az, akinek látszik? Vagy megérdemli mindazt, amit rámérnek?\r\n\r\nMindenkinek vannak titkai. Némelyik azonban halálos', 'A lány akinek nincs múltja.jpg', '9786155676475', 8);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlas`
--

CREATE TABLE `vasarlas` (
  `felhasznaloid` int(11) NOT NULL,
  `konnyvid` int(11) NOT NULL,
  `db` int(11) NOT NULL DEFAULT 1,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `megjegyzes` varchar(600) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vasarlas`
--

INSERT INTO `vasarlas` (`felhasznaloid`, `konnyvid`, `db`, `datum`, `megjegyzes`) VALUES
(1, 40, 0, '2021-03-13', ''),
(1, 40, 0, '2021-03-14', ''),
(1, 32, 0, '2021-03-14', ''),
(1, 41, 0, '2021-03-14', ''),
(2, 41, 0, '2021-03-20', ''),
(2, 66, 0, '2021-03-20', ''),
(3, 37, 0, '2021-03-30', '');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`azonosito`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`kategoriaid`);

--
-- A tábla indexei `konyvek`
--
ALTER TABLE `konyvek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategoria` (`kategoriaid`);

--
-- A tábla indexei `vasarlas`
--
ALTER TABLE `vasarlas`
  ADD KEY `fk_felhasznalo` (`felhasznaloid`),
  ADD KEY `fk_konyvek` (`konnyvid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `azonosito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `kategoriaid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `konyvek`
--
ALTER TABLE `konyvek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `konyvek`
--
ALTER TABLE `konyvek`
  ADD CONSTRAINT `fk_kategoria` FOREIGN KEY (`kategoriaid`) REFERENCES `kategoria` (`kategoriaid`);

--
-- Megkötések a táblához `vasarlas`
--
ALTER TABLE `vasarlas`
  ADD CONSTRAINT `fk_felhasznalo` FOREIGN KEY (`felhasznaloid`) REFERENCES `felhasznalo` (`id`),
  ADD CONSTRAINT `fk_konyvek` FOREIGN KEY (`konnyvid`) REFERENCES `konyvek` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
