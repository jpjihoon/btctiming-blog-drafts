<?php $slug = 'jscrambler-npm-supply-chain-crypto-wallet-infostealer'; require __DIR__.'/_header.php'; ?>

<p class="ko">자바스크립트 난독화 툴 jscrambler의 공식 npm 패키지가 7월 11일(협정시, UTC) 해킹당해 설치 시 자동 실행되는 '프리인스톨(preinstall)' 스크립트에 러스트(Rust)로 컴파일된 정보탈취 악성코드가 심어진 것으로 확인됐다. 보안 매체 더해커뉴스(The Hacker News)와 소프트웨어 공급망 보안업체 스텝시큐리티(StepSecurity), 세이프뎁(SafeDep)에 따르면, 8.14.0 버전이 UTC 15시12분에 배포된 것을 시작으로 약 3시간 동안 8.16.0·8.17.0·8.18.0·8.20.0 등 정상 버전과 번갈아 총 5개의 악성 버전이 배포됐다. 이 악성코드는 메타마스크(MetaMask)·팬텀(Phantom)·이그저더스(Exodus) 등 암호화폐 지갑의 니모닉 구문과 AWS·애저·구글클라우드 인증정보, 비트워든(Bitwarden) 금고 데이터를 노렸다. 매달 약 6만 회 다운로드되는 패키지라 파급 범위가 작지 않다는 평가다.</p>
<p class="en">The official npm package for jscrambler, a JavaScript obfuscation tool, was compromised on July 11 (UTC), with a malicious "preinstall" script — code that runs automatically on installation — dropping a Rust-compiled infostealer, according to The Hacker News, supply-chain security firm StepSecurity, and SafeDep. Version 8.14.0 shipped the dropper at 15:12 UTC, kicking off roughly three hours during which five malicious releases (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) were interleaved with clean versions. The malware targeted seed phrases from crypto wallets including MetaMask, Phantom, and Exodus, along with AWS, Azure, and Google Cloud credentials and Bitwarden vault data. With roughly 60,000 monthly downloads, the package's reach is far from trivial.</p>
<p class="ja">JavaScript難読化ツールjscramblerの公式npmパッケージが7月11日(協定世界時、UTC)に侵害され、インストール時に自動実行される「プリインストール(preinstall)」スクリプトにRust製の情報窃取マルウェアが仕込まれたことが分かった。セキュリティメディアのThe Hacker News、ソフトウェアサプライチェーンセキュリティ企業のStepSecurity、SafeDepによると、8.14.0バージョンがUTC15時12分に配布されたのを皮切りに、約3時間の間に8.16.0・8.17.0・8.18.0・8.20.0など正規バージョンと交互に計5つの悪性バージョンが配布された。このマルウェアはメタマスク(MetaMask)・ファントム(Phantom)・エクソダス(Exodus)などの暗号資産ウォレットのシードフレーズと、AWS・Azure・Google Cloudの認証情報、Bitwardenのボールトデータを狙った。月間およそ6万回ダウンロードされるパッケージであり、影響範囲は小さくないとみられる。</p>
<p class="es">El paquete oficial de npm para jscrambler, una herramienta de ofuscación de JavaScript, fue comprometido el 11 de julio (UTC), cuando un script malicioso de "preinstall" —código que se ejecuta automáticamente al instalar— soltó un infostealer compilado en Rust, según The Hacker News, la firma de seguridad de cadena de suministro StepSecurity y SafeDep. La versión 8.14.0 lanzó el dropper a las 15:12 UTC, dando inicio a unas tres horas durante las cuales se intercalaron cinco versiones maliciosas (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) con versiones limpias. El malware apuntaba a las frases semilla de wallets cripto como MetaMask, Phantom y Exodus, junto con credenciales de AWS, Azure y Google Cloud y datos de la bóveda de Bitwarden. Con unas 60.000 descargas mensuales, el alcance del paquete no es trivial.</p>
<p class="de">Das offizielle npm-Paket für jscrambler, ein JavaScript-Verschleierungstool, wurde am 11. Juli (UTC) kompromittiert: Ein bösartiges "preinstall"-Skript — Code, der bei der Installation automatisch ausgeführt wird — schleuste einen in Rust kompilierten Infostealer ein, wie The Hacker News, die Lieferketten-Sicherheitsfirma StepSecurity und SafeDep berichteten. Version 8.14.0 lieferte den Dropper um 15:12 UTC aus und leitete damit rund drei Stunden ein, in denen fünf bösartige Releases (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) mit sauberen Versionen abwechselten. Die Malware zielte auf Seed-Phrasen von Krypto-Wallets wie MetaMask, Phantom und Exodus sowie auf AWS-, Azure- und Google-Cloud-Zugangsdaten und Bitwarden-Tresordaten ab. Bei rund 60.000 monatlichen Downloads ist die Reichweite des Pakets alles andere als gering.</p>
<p class="fr">Le paquet npm officiel de jscrambler, un outil d'obfuscation JavaScript, a été compromis le 11 juillet (UTC) : un script "preinstall" malveillant — du code exécuté automatiquement lors de l'installation — a déposé un infostealer compilé en Rust, selon The Hacker News, la société de sécurité de la chaîne d'approvisionnement StepSecurity et SafeDep. La version 8.14.0 a livré le dropper à 15h12 UTC, lançant environ trois heures durant lesquelles cinq versions malveillantes (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) ont été intercalées avec des versions saines. Le logiciel malveillant ciblait les phrases de récupération de wallets crypto comme MetaMask, Phantom et Exodus, ainsi que les identifiants AWS, Azure et Google Cloud et les données du coffre-fort Bitwarden. Avec environ 60 000 téléchargements mensuels, la portée du paquet est loin d'être négligeable.</p>
<p class="pt">O pacote oficial npm do jscrambler, uma ferramenta de ofuscação de JavaScript, foi comprometido em 11 de julho (UTC): um script malicioso de "preinstall" — código executado automaticamente na instalação — implantou um infostealer compilado em Rust, segundo o The Hacker News, a empresa de segurança de cadeia de suprimentos StepSecurity e a SafeDep. A versão 8.14.0 entregou o dropper às 15h12 UTC, dando início a cerca de três horas durante as quais cinco versões maliciosas (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) foram intercaladas com versões limpas. O malware mirava frases-semente de carteiras cripto como MetaMask, Phantom e Exodus, além de credenciais da AWS, Azure e Google Cloud e dados do cofre do Bitwarden. Com cerca de 60 mil downloads mensais, o alcance do pacote está longe de ser trivial.</p>
<p class="tr">JavaScript gizleme aracı jscrambler'ın resmi npm paketi, 11 Temmuz'da (UTC) ele geçirildi; kuruluş sırasında otomatik çalışan kötü amaçlı bir "preinstall" betiği, Rust ile derlenmiş bir bilgi hırsızı yazılımı bıraktı. Bu bilgiler The Hacker News, tedarik zinciri güvenlik firması StepSecurity ve SafeDep tarafından bildirildi. 8.14.0 sürümü, damlalığı UTC 15:12'de dağıttı ve yaklaşık üç saat boyunca beş kötü amaçlı sürümün (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) temiz sürümlerle iç içe yayınlanmasına yol açtı. Kötü amaçlı yazılım, MetaMask, Phantom ve Exodus gibi kripto cüzdanlarının kurtarma ifadelerini, AWS, Azure ve Google Cloud kimlik bilgilerini ve Bitwarden kasa verilerini hedef aldı. Ayda yaklaşık 60.000 indirmeye sahip bu paketin etki alanı hiç de küçük değil.</p>
<p class="vi">Gói npm chính thức của jscrambler, một công cụ làm rối mã JavaScript, đã bị xâm phạm vào ngày 11/7 (UTC) khi một tập lệnh "preinstall" độc hại — mã tự động chạy khi cài đặt — cài vào một phần mềm đánh cắp thông tin được biên dịch bằng Rust, theo The Hacker News, công ty bảo mật chuỗi cung ứng StepSecurity và SafeDep. Phiên bản 8.14.0 phát tán mã độc lúc 15:12 UTC, mở đầu cho khoảng ba giờ trong đó năm phiên bản độc hại (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) được xen kẽ với các phiên bản sạch. Phần mềm độc hại nhắm vào cụm từ khôi phục của các ví crypto như MetaMask, Phantom và Exodus, cùng với thông tin xác thực AWS, Azure, Google Cloud và dữ liệu kho Bitwarden. Với khoảng 60.000 lượt tải mỗi tháng, phạm vi ảnh hưởng của gói này không hề nhỏ.</p>
<p class="id">Paket npm resmi untuk jscrambler, sebuah alat obfuscation JavaScript, disusupi pada 11 Juli (UTC), dengan skrip "preinstall" berbahaya — kode yang otomatis dijalankan saat instalasi — yang menyisipkan infostealer hasil kompilasi Rust, menurut The Hacker News, perusahaan keamanan rantai pasok StepSecurity, dan SafeDep. Versi 8.14.0 merilis dropper tersebut pada pukul 15:12 UTC, memulai sekitar tiga jam di mana lima rilis berbahaya (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) diselingi dengan versi bersih. Malware ini menargetkan seed phrase dari dompet kripto termasuk MetaMask, Phantom, dan Exodus, beserta kredensial AWS, Azure, dan Google Cloud serta data brankas Bitwarden. Dengan sekitar 60.000 unduhan per bulan, jangkauan paket ini jauh dari kata sepele.</p>
<p class="pl">Oficjalny pakiet npm dla jscrambler, narzędzia do obfuskacji JavaScript, został przejęty 11 lipca (UTC), gdy złośliwy skrypt "preinstall" — kod uruchamiany automatycznie podczas instalacji — wprowadził infostealera skompilowanego w Rust, jak podają The Hacker News, firma bezpieczeństwa łańcucha dostaw StepSecurity oraz SafeDep. Wersja 8.14.0 dostarczyła droppera o 15:12 UTC, rozpoczynając około trzy godziny, w trakcie których pięć złośliwych wydań (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) przeplatało się z czystymi wersjami. Złośliwe oprogramowanie atakowało frazy seed z portfeli kryptowalut, w tym MetaMask, Phantom i Exodus, a także dane uwierzytelniające AWS, Azure i Google Cloud oraz dane skarbca Bitwarden. Przy około 60 000 pobrań miesięcznie zasięg pakietu jest daleki od marginalnego.</p>
<p class="it">Il pacchetto npm ufficiale di jscrambler, uno strumento di offuscamento JavaScript, è stato compromesso l'11 luglio (UTC): uno script "preinstall" dannoso — codice eseguito automaticamente all'installazione — ha rilasciato un infostealer compilato in Rust, secondo The Hacker News, la società di sicurezza della supply chain StepSecurity e SafeDep. La versione 8.14.0 ha distribuito il dropper alle 15:12 UTC, dando inizio a circa tre ore durante le quali cinque versioni dannose (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) si sono alternate a versioni pulite. Il malware puntava alle seed phrase di wallet crypto tra cui MetaMask, Phantom ed Exodus, oltre alle credenziali AWS, Azure e Google Cloud e ai dati del vault di Bitwarden. Con circa 60.000 download mensili, la portata del pacchetto è tutt'altro che trascurabile.</p>
<p class="ru">Официальный npm-пакет jscrambler, инструмента для обфускации JavaScript, был скомпрометирован 11 июля (UTC): вредоносный скрипт «preinstall» — код, автоматически запускающийся при установке — внедрил инфостилер, скомпилированный на Rust, сообщают The Hacker News, компания по безопасности цепочек поставок StepSecurity и SafeDep. Версия 8.14.0 доставила дроппер в 15:12 UTC, положив начало примерно трёхчасовому периоду, в течение которого пять вредоносных релизов (8.14.0, 8.16.0, 8.17.0, 8.18.0, 8.20.0) чередовались с чистыми версиями. Вредоносная программа охотилась за seed-фразами криптокошельков, включая MetaMask, Phantom и Exodus, а также за учётными данными AWS, Azure и Google Cloud и данными хранилища Bitwarden. При примерно 60 000 загрузок в месяц масштаб охвата пакета отнюдь не мал.</p>
<p class="zh">據The Hacker News、供應鏈安全公司StepSecurity與SafeDep報導,JavaScript混淆工具jscrambler的官方npm套件於7月11日(UTC)遭入侵,一個惡意的「preinstall」腳本——會在安裝時自動執行的程式碼——植入了以Rust編譯的資訊竊取惡意軟體。8.14.0版本於UTC時間15:12發布了該植入程式,揭開了長達約三小時的循環,期間五個惡意版本(8.14.0、8.16.0、8.17.0、8.18.0、8.20.0)與乾淨版本交替發布。該惡意軟體鎖定包括MetaMask、Phantom與Exodus在內的加密貨幣錢包助記詞,以及AWS、Azure、Google Cloud的憑證與Bitwarden保管庫資料。以每月約6萬次下載量計算,該套件的影響範圍絕非微不足道。</p>

<h2 class="ko">지우고 다시 심고 — 3시간 동안의 술래잡기</h2>
<h2 class="en">Removed and reinserted — a three-hour cat-and-mouse game</h2>
<h2 class="ja">消しては再び埋め込む — 3時間の攻防</h2>
<h2 class="es">Eliminado y reinsertado: un juego del gato y el ratón de tres horas</h2>
<h2 class="de">Entfernt und wieder eingeschleust — ein dreistündiges Katz-und-Maus-Spiel</h2>
<h2 class="fr">Supprimé puis réintroduit — un jeu du chat et de la souris de trois heures</h2>
<h2 class="pt">Removido e reinserido — um jogo de gato e rato de três horas</h2>
<h2 class="tr">Silindi ve yeniden eklendi — üç saatlik kedi fare oyunu</h2>
<h2 class="vi">Bị xóa rồi lại cài lại — trò chơi mèo vờn chuột kéo dài ba giờ</h2>
<h2 class="id">Dihapus lalu disisipkan kembali — permainan kucing-tikus selama tiga jam</h2>
<h2 class="pl">Usunięte i ponownie wprowadzone — trzygodzinna gra w kotka i myszkę</h2>
<h2 class="it">Rimosso e reinserito — un gioco del gatto e del topo di tre ore</h2>
<h2 class="ru">Удалено и снова внедрено — трёхчасовая игра в кошки-мышки</h2>
<h2 class="zh">刪除又重新植入——長達三小時的貓捉老鼠遊戲</h2>

<p class="ko">타임라인을 보면 단순한 일회성 배포 사고가 아니라는 점이 드러난다. 8.14.0이 UTC 15시12분에 프리인스톨 훅과 함께 배포된 지 약 2시간 뒤인 17시07분, 유지관리자로 추정되는 계정이 8.15.0을 배포했다. 이 버전에서는 문제의 훅이 제거됐고 악성 파일이 담겨 있던 dist/setup.js와 dist/intro.js도 사라졌으며, 핵심 파일인 dist/index.js와 dist/bin/jscrambler.js는 마지막 정상 버전이었던 8.13.0과 바이트 단위로 완전히 동일했다. 겉으로는 신속하고 정확한 초동 대응처럼 보였다.</p>
<p class="en">The timeline shows this was no one-off publishing accident. About two hours after 8.14.0 shipped the preinstall hook at 15:12 UTC, an account presumed to belong to a maintainer published 8.15.0 at 17:07. That release removed the offending hook along with dist/setup.js and dist/intro.js, the files carrying the payload, and its core files — dist/index.js and dist/bin/jscrambler.js — were byte-for-byte identical to the last clean version, 8.13.0. On the surface, it looked like a swift, accurate first response.</p>
<p class="ja">タイムラインを見ると、単発の配布事故ではないことが分かる。8.14.0がUTC15時12分にプリインストールフックとともに配布されてから約2時間後の17時07分、メンテナーのものとみられるアカウントが8.15.0を配布した。このバージョンでは問題のフックが削除され、ペイロードを含んでいたdist/setup.jsとdist/intro.jsも消え、中核ファイルであるdist/index.jsとdist/bin/jscrambler.jsは最後の正規バージョンだった8.13.0とバイト単位で完全に一致していた。表面上は迅速かつ的確な初動対応に見えた。</p>
<p class="es">La cronología muestra que no se trató de un incidente de publicación aislado. Unas dos horas después de que 8.14.0 entregara el hook de preinstall a las 15:12 UTC, una cuenta que se presume de un mantenedor publicó la versión 8.15.0 a las 17:07. Esa versión eliminó el hook problemático junto con dist/setup.js y dist/intro.js, los archivos que contenían la carga útil, y sus archivos centrales —dist/index.js y dist/bin/jscrambler.js— eran idénticos byte a byte a la última versión limpia, la 8.13.0. En apariencia, parecía una respuesta inicial rápida y precisa.</p>
<p class="de">Die Zeitleiste zeigt, dass es sich nicht um einen einmaligen Veröffentlichungsunfall handelte. Etwa zwei Stunden nachdem 8.14.0 um 15:12 UTC den Preinstall-Hook ausgeliefert hatte, veröffentlichte ein vermutlich einem Maintainer gehörendes Konto um 17:07 Uhr die Version 8.15.0. Diese Version entfernte den fraglichen Hook zusammen mit dist/setup.js und dist/intro.js, den Dateien, die die Payload enthielten, und ihre Kerndateien — dist/index.js und dist/bin/jscrambler.js — waren byteidentisch mit der letzten sauberen Version 8.13.0. Oberflächlich betrachtet wirkte dies wie eine schnelle, präzise Erstreaktion.</p>
<p class="fr">La chronologie montre qu'il ne s'agissait pas d'un incident de publication isolé. Environ deux heures après que la version 8.14.0 a livré le hook preinstall à 15h12 UTC, un compte présumé appartenir à un mainteneur a publié la version 8.15.0 à 17h07. Cette version a supprimé le hook incriminé ainsi que dist/setup.js et dist/intro.js, les fichiers portant la charge utile, et ses fichiers centraux — dist/index.js et dist/bin/jscrambler.js — étaient identiques bit à bit à la dernière version saine, la 8.13.0. En apparence, cela ressemblait à une première réponse rapide et précise.</p>
<p class="pt">A linha do tempo mostra que não se tratou de um incidente de publicação isolado. Cerca de duas horas depois que a versão 8.14.0 entregou o hook de preinstall às 15h12 UTC, uma conta presumivelmente pertencente a um mantenedor publicou a versão 8.15.0 às 17h07. Essa versão removeu o hook problemático junto com dist/setup.js e dist/intro.js, os arquivos que carregavam a carga maliciosa, e seus arquivos principais — dist/index.js e dist/bin/jscrambler.js — eram idênticos byte a byte à última versão limpa, a 8.13.0. Na superfície, parecia uma resposta inicial rápida e precisa.</p>
<p class="tr">Zaman çizelgesi, bunun tek seferlik bir yayınlama kazası olmadığını gösteriyor. 8.14.0'ın preinstall kancasını UTC 15:12'de dağıtmasından yaklaşık iki saat sonra, bir bakımcıya ait olduğu varsayılan bir hesap saat 17:07'de 8.15.0 sürümünü yayınladı. Bu sürüm, sorunlu kancayı, yükü taşıyan dist/setup.js ve dist/intro.js dosyalarıyla birlikte kaldırdı; ana dosyaları olan dist/index.js ve dist/bin/jscrambler.js, son temiz sürüm olan 8.13.0 ile bayt bayt aynıydı. Görünüşte, hızlı ve isabetli bir ilk müdahale gibiydi.</p>
<p class="vi">Dòng thời gian cho thấy đây không phải là một sự cố phát hành đơn lẻ. Khoảng hai giờ sau khi phiên bản 8.14.0 phát tán mã độc lúc 15:12 UTC, một tài khoản được cho là của người bảo trì đã phát hành phiên bản 8.15.0 lúc 17:07. Phiên bản này đã loại bỏ móc gọi có vấn đề cùng với dist/setup.js và dist/intro.js, các tệp chứa payload, và các tệp cốt lõi của nó — dist/index.js và dist/bin/jscrambler.js — giống hệt từng byte với phiên bản sạch cuối cùng, 8.13.0. Bề ngoài, đây có vẻ là một phản ứng ban đầu nhanh chóng và chính xác.</p>
<p class="id">Garis waktu ini menunjukkan bahwa ini bukan insiden publikasi sekali jadi. Sekitar dua jam setelah 8.14.0 merilis hook preinstall pada 15:12 UTC, sebuah akun yang diduga milik maintainer merilis 8.15.0 pada 17:07. Rilis tersebut menghapus hook bermasalah beserta dist/setup.js dan dist/intro.js, file-file yang membawa payload, dan file inti-nya — dist/index.js dan dist/bin/jscrambler.js — identik byte demi byte dengan versi bersih terakhir, 8.13.0. Secara kasat mata, ini tampak seperti respons awal yang cepat dan akurat.</p>
<p class="pl">Oś czasu pokazuje, że nie był to jednorazowy incydent publikacji. Około dwie godziny po tym, jak 8.14.0 dostarczyło hook preinstall o 15:12 UTC, konto przypuszczalnie należące do maintainera opublikowało 8.15.0 o 17:07. To wydanie usunęło szkodliwy hook wraz z dist/setup.js i dist/intro.js, plikami niosącymi ładunek, a jego pliki kluczowe — dist/index.js i dist/bin/jscrambler.js — były identyczne bajt po bajcie z ostatnią czystą wersją, 8.13.0. Na pierwszy rzut oka wyglądało to na szybką i trafną pierwszą reakcję.</p>
<p class="it">La cronologia mostra che non si è trattato di un incidente di pubblicazione isolato. Circa due ore dopo che 8.14.0 aveva distribuito l'hook preinstall alle 15:12 UTC, un account presumibilmente appartenente a un maintainer ha pubblicato la 8.15.0 alle 17:07. Quella release ha rimosso l'hook incriminato insieme a dist/setup.js e dist/intro.js, i file che trasportavano il payload, e i suoi file principali — dist/index.js e dist/bin/jscrambler.js — erano identici byte per byte all'ultima versione pulita, la 8.13.0. In apparenza, sembrava una prima risposta rapida e precisa.</p>
<p class="ru">Хронология показывает, что это не был единичный инцидент публикации. Примерно через два часа после того, как 8.14.0 доставила хук preinstall в 15:12 UTC, аккаунт, предположительно принадлежащий мейнтейнеру, опубликовал версию 8.15.0 в 17:07. Этот релиз удалил проблемный хук вместе с dist/setup.js и dist/intro.js — файлами, содержавшими полезную нагрузку, а его основные файлы — dist/index.js и dist/bin/jscrambler.js — были побайтово идентичны последней чистой версии 8.13.0. На первый взгляд это выглядело как быстрая и точная первая реакция.</p>
<p class="zh">時間軸顯示這並非一次單純的發布事故。8.14.0於UTC時間15:12發布preinstall鉤子約兩小時後,一個疑似維護者所有的帳號於17:07發布了8.15.0。該版本移除了有問題的鉤子,以及承載酬載的dist/setup.js與dist/intro.js檔案,其核心檔案——dist/index.js與dist/bin/jscrambler.js——與最後一個乾淨版本8.13.0逐位元組完全相同。表面上看,這像是一次迅速且準確的初步應對。</p>

<p class="ko">그러나 반전은 단 19분 뒤에 벌어졌다. 17시26분 배포된 8.16.0은 "preinstall": "node dist/setup.js"라는 정확히 동일한 훅을 되살렸고, intro.js도 8.14.0 배포본과 SHA256 해시가 완전히 같은 파일로 다시 심어졌다. 이는 최초 대응이 악성 파일만 지웠을 뿐, 공격자의 게시 권한(퍼블리시 토큰 혹은 계정 자체)은 회수하지 못했다는 뜻이다. 이후 8.17.0·8.18.0·8.20.0까지 정상 배포와 악성 배포가 뒤섞이며 총 5개의 악성 버전이 약 3시간에 걸쳐 나왔다. 단일 파일 제거로는 부족했고, 계정 접근권 자체를 완전히 차단해야만 사이클이 끊긴다는 사실을 보여준 사례다.</p>
<p class="en">The twist came just 19 minutes later. Version 8.16.0, published at 17:26, restored the exact same "preinstall": "node dist/setup.js" hook, and intro.js was reinserted as a file whose SHA256 hash matched the 8.14.0 payload exactly. That means the first response only deleted the malicious files — it never revoked the attacker's publishing access, whether a publish token or the account itself. Clean and malicious releases kept alternating through 8.17.0, 8.18.0, and 8.20.0, producing five malicious versions in all over roughly three hours. Removing a single file wasn't enough; only fully cutting off account-level access would have broken the cycle.</p>
<p class="ja">しかし反転はわずか19分後に起きた。17時26分に配布された8.16.0は「"preinstall": "node dist/setup.js"」というまったく同じフックを復元し、intro.jsも8.14.0の配布物とSHA256ハッシュが完全に一致するファイルとして再び仕込まれた。これは最初の対応が悪性ファイルを削除しただけで、攻撃者の配布権限(パブリッシュトークンないしアカウント自体)を回収できていなかったことを意味する。その後8.17.0・8.18.0・8.20.0まで正規配布と悪性配布が入り混じり、約3時間で計5つの悪性バージョンが出た。単一ファイルの削除だけでは不十分で、アカウントレベルのアクセス権限そのものを完全に遮断しない限りサイクルは断ち切れないことを示す事例だ。</p>
<p class="es">El giro llegó apenas 19 minutos después. La versión 8.16.0, publicada a las 17:26, restauró exactamente el mismo hook "preinstall": "node dist/setup.js", e intro.js fue reinsertado como un archivo cuyo hash SHA256 coincidía exactamente con el payload de 8.14.0. Eso significa que la primera respuesta solo eliminó los archivos maliciosos, sin revocar nunca el acceso de publicación del atacante, ya fuera un token de publicación o la cuenta misma. Las versiones limpias y maliciosas siguieron alternándose hasta 8.17.0, 8.18.0 y 8.20.0, produciendo en total cinco versiones maliciosas en unas tres horas. Eliminar un solo archivo no bastó: solo cortar por completo el acceso a nivel de cuenta habría roto el ciclo.</p>
<p class="de">Die Wendung kam nur 19 Minuten später. Version 8.16.0, veröffentlicht um 17:26 Uhr, stellte genau denselben Hook "preinstall": "node dist/setup.js" wieder her, und intro.js wurde als Datei wieder eingefügt, deren SHA256-Hash exakt mit der 8.14.0-Payload übereinstimmte. Das bedeutet, dass die erste Reaktion nur die bösartigen Dateien löschte — der Zugang des Angreifers zur Veröffentlichung, sei es ein Publish-Token oder das Konto selbst, wurde nie widerrufen. Saubere und bösartige Releases wechselten sich bis zu 8.17.0, 8.18.0 und 8.20.0 weiter ab und brachten insgesamt fünf bösartige Versionen innerhalb von rund drei Stunden hervor. Das Entfernen einer einzelnen Datei reichte nicht aus — nur ein vollständiger Entzug des Kontozugriffs hätte den Kreislauf durchbrochen.</p>
<p class="fr">Le rebondissement est survenu à peine 19 minutes plus tard. La version 8.16.0, publiée à 17h26, a restauré exactement le même hook "preinstall": "node dist/setup.js", et intro.js a été réinséré sous la forme d'un fichier dont le hash SHA256 correspondait exactement à la charge utile de 8.14.0. Cela signifie que la première réponse s'est contentée de supprimer les fichiers malveillants, sans jamais révoquer l'accès de publication de l'attaquant, qu'il s'agisse d'un jeton de publication ou du compte lui-même. Les versions saines et malveillantes ont continué de s'alterner jusqu'à 8.17.0, 8.18.0 et 8.20.0, produisant en tout cinq versions malveillantes en environ trois heures. Supprimer un seul fichier ne suffisait pas ; seule une coupure complète de l'accès au niveau du compte aurait brisé le cycle.</p>
<p class="pt">A reviravolta veio apenas 19 minutos depois. A versão 8.16.0, publicada às 17h26, restaurou exatamente o mesmo hook "preinstall": "node dist/setup.js", e o intro.js foi reinserido como um arquivo cujo hash SHA256 coincidia exatamente com a carga maliciosa da 8.14.0. Isso significa que a primeira resposta apenas apagou os arquivos maliciosos — nunca revogou o acesso de publicação do atacante, seja um token de publicação, seja a própria conta. Versões limpas e maliciosas continuaram se alternando até a 8.17.0, 8.18.0 e 8.20.0, produzindo ao todo cinco versões maliciosas em cerca de três horas. Remover um único arquivo não foi suficiente; somente cortar totalmente o acesso em nível de conta teria rompido o ciclo.</p>
<p class="tr">Beklenmedik gelişme sadece 19 dakika sonra yaşandı. Saat 17:26'da yayınlanan 8.16.0 sürümü, tam olarak aynı "preinstall": "node dist/setup.js" kancasını geri getirdi ve intro.js, SHA256 karması 8.14.0 yüküyle tamamen eşleşen bir dosya olarak yeniden eklendi. Bu, ilk müdahalenin yalnızca kötü amaçlı dosyaları sildiğini, saldırganın yayınlama erişimini — bir yayınlama belirteci ya da hesabın kendisi olsun — hiçbir zaman iptal etmediğini gösteriyor. Temiz ve kötü amaçlı sürümler 8.17.0, 8.18.0 ve 8.20.0'a kadar birbirini izlemeye devam etti ve yaklaşık üç saat içinde toplam beş kötü amaçlı sürüm ortaya çıktı. Tek bir dosyayı kaldırmak yeterli değildi; döngüyü ancak hesap düzeyindeki erişimin tamamen kesilmesi kırabilirdi.</p>
<p class="vi">Bước ngoặt xảy ra chỉ 19 phút sau đó. Phiên bản 8.16.0, phát hành lúc 17:26, đã khôi phục chính xác cùng một móc gọi "preinstall": "node dist/setup.js", và intro.js được cài lại dưới dạng một tệp có mã băm SHA256 khớp hoàn toàn với payload của 8.14.0. Điều này có nghĩa là phản ứng đầu tiên chỉ xóa các tệp độc hại — chưa bao giờ thu hồi quyền truy cập phát hành của kẻ tấn công, dù đó là token phát hành hay chính tài khoản đó. Các phiên bản sạch và độc hại tiếp tục xen kẽ cho đến 8.17.0, 8.18.0 và 8.20.0, tạo ra tổng cộng năm phiên bản độc hại trong khoảng ba giờ. Việc xóa một tệp duy nhất là chưa đủ; chỉ có việc cắt hoàn toàn quyền truy cập ở cấp tài khoản mới có thể phá vỡ vòng lặp này.</p>
<p class="id">Namun kejutan datang hanya 19 menit kemudian. Versi 8.16.0, yang dirilis pada 17:26, memulihkan hook "preinstall": "node dist/setup.js" yang persis sama, dan intro.js disisipkan kembali sebagai file yang hash SHA256-nya cocok persis dengan payload 8.14.0. Ini berarti respons pertama hanya menghapus file berbahaya — tidak pernah mencabut akses publikasi penyerang, baik itu token publikasi maupun akun itu sendiri. Rilis bersih dan berbahaya terus berselang-seling hingga 8.17.0, 8.18.0, dan 8.20.0, menghasilkan total lima versi berbahaya dalam kurun waktu sekitar tiga jam. Menghapus satu file saja tidak cukup; hanya dengan memutus sepenuhnya akses di tingkat akun siklus itu bisa dihentikan.</p>
<p class="pl">Zwrot akcji nastąpił zaledwie 19 minut później. Wersja 8.16.0, opublikowana o 17:26, przywróciła dokładnie ten sam hook "preinstall": "node dist/setup.js", a intro.js zostało ponownie wstawione jako plik, którego hash SHA256 dokładnie odpowiadał ładunkowi z 8.14.0. Oznacza to, że pierwsza reakcja jedynie usunęła złośliwe pliki — nigdy nie cofnięto dostępu atakującego do publikacji, czy to tokenu publikacji, czy samego konta. Czyste i złośliwe wydania nadal się przeplatały aż do 8.17.0, 8.18.0 i 8.20.0, dając w sumie pięć złośliwych wersji w ciągu około trzech godzin. Usunięcie pojedynczego pliku nie wystarczyło; tylko całkowite odcięcie dostępu na poziomie konta przerwałoby ten cykl.</p>
<p class="it">Il colpo di scena è arrivato appena 19 minuti dopo. La versione 8.16.0, pubblicata alle 17:26, ha ripristinato esattamente lo stesso hook "preinstall": "node dist/setup.js", e intro.js è stato reinserito come file il cui hash SHA256 corrispondeva esattamente al payload della 8.14.0. Ciò significa che la prima risposta si è limitata a eliminare i file dannosi — non ha mai revocato l'accesso alla pubblicazione dell'attaccante, che si trattasse di un token di pubblicazione o dell'account stesso. Le release pulite e dannose hanno continuato ad alternarsi fino alla 8.17.0, 8.18.0 e 8.20.0, producendo in totale cinque versioni dannose in circa tre ore. Rimuovere un singolo file non è bastato; solo un taglio completo dell'accesso a livello di account avrebbe interrotto il ciclo.</p>
<p class="ru">Поворот произошёл всего через 19 минут. Версия 8.16.0, опубликованная в 17:26, восстановила точно такой же хук «preinstall»: «node dist/setup.js», а intro.js была повторно внедрена как файл, чей хеш SHA256 в точности совпадал с полезной нагрузкой 8.14.0. Это означает, что первая реакция лишь удалила вредоносные файлы — доступ злоумышленника к публикации, будь то токен публикации или сам аккаунт, так и не был отозван. Чистые и вредоносные релизы продолжали чередоваться вплоть до 8.17.0, 8.18.0 и 8.20.0, в итоге дав пять вредоносных версий примерно за три часа. Удаления одного файла оказалось недостаточно; разорвать цикл могло только полное отключение доступа на уровне аккаунта.</p>
<p class="zh">轉折在僅僅19分鐘後出現。於17:26發布的8.16.0版本恢復了完全相同的「preinstall」:「node dist/setup.js」鉤子,intro.js也被重新植入,其SHA256雜湊值與8.14.0的酬載完全一致。這意味著最初的應對只刪除了惡意檔案——從未撤銷攻擊者的發布權限,無論是發布權杖還是帳號本身。乾淨版本與惡意版本持續交替發布,直到8.17.0、8.18.0與8.20.0,總計在約三小時內產生五個惡意版本。僅刪除單一檔案並不足夠;只有完全切斷帳號層級的存取權限才能中斷這個循環。</p>

<h2 class="ko">프리인스톨 훅이 위험한 이유 — npm 생명주기 스크립트의 오래된 약점</h2>
<h2 class="en">Why the preinstall hook is dangerous — an old weakness in npm lifecycle scripts</h2>
<h2 class="ja">プリインストールフックが危険な理由 — npmライフサイクルスクリプトの古い弱点</h2>
<h2 class="es">Por qué el hook de preinstall es peligroso: una vieja debilidad de los scripts de ciclo de vida de npm</h2>
<h2 class="de">Warum der Preinstall-Hook gefährlich ist — eine alte Schwäche der npm-Lifecycle-Skripte</h2>
<h2 class="fr">Pourquoi le hook preinstall est dangereux — une vieille faiblesse des scripts de cycle de vie npm</h2>
<h2 class="pt">Por que o hook de preinstall é perigoso — uma velha fraqueza dos scripts de ciclo de vida do npm</h2>
<h2 class="tr">Preinstall kancası neden tehlikeli — npm yaşam döngüsü betiklerinin eski bir zayıflığı</h2>
<h2 class="vi">Vì sao móc gọi preinstall lại nguy hiểm — điểm yếu lâu đời của các tập lệnh vòng đời npm</h2>
<h2 class="id">Mengapa hook preinstall berbahaya — kelemahan lama dalam skrip siklus hidup npm</h2>
<h2 class="pl">Dlaczego hook preinstall jest niebezpieczny — stara słabość skryptów cyklu życia npm</h2>
<h2 class="it">Perché l'hook preinstall è pericoloso — una vecchia debolezza degli script del ciclo di vita di npm</h2>
<h2 class="ru">Почему хук preinstall опасен — старая слабость скриптов жизненного цикла npm</h2>
<h2 class="zh">為何preinstall鉤子如此危險——npm生命週期腳本的老舊弱點</h2>

<p class="ko">npm 생태계는 패키지를 설치할 때 preinstall·postinstall 같은 '생명주기 스크립트'가 별도 승인 절차 없이 자동으로 실행되도록 허용한다. 개발 편의를 위한 설계지만, 동시에 공격자가 코드 저장소를 직접 훼손하지 않고도 설치 단계에서 임의 코드를 실행시킬 수 있는 통로가 된다. 이번 공격에서는 러스트로 컴파일한 네이티브 바이너리를 윈도(PE32+)·맥(Mach-O arm64)·리눅스(ELF)용으로 각각 준비한 뒤, 커스텀 5바이트 매직 헤더 뒤에 숨겨 .js 확장자 파일로 위장했다. 이렇게 하면 정적 분석 도구가 파일 확장자만 보고 자바스크립트로 오인하기 쉽고, 실행 시점에는 이미 운영체제별 바이너리가 조용히 실행된 뒤다.</p>
<p class="en">The npm ecosystem lets lifecycle scripts like preinstall and postinstall run automatically when a package is installed, with no separate approval step. It's a convenience for developers, but it also gives an attacker a channel to execute arbitrary code at install time without ever touching the code repository itself. In this attack, Rust-compiled native binaries were prepared separately for Windows (PE32+), macOS (Mach-O arm64), and Linux (ELF), then hidden behind a custom 5-byte magic header and disguised as a .js file. That makes it easy for static-analysis tools to mistake the file for JavaScript based on its extension alone — and by the time anyone looks closer, the OS-specific binary has already run silently.</p>
<p class="ja">npmのエコシステムでは、パッケージをインストールする際にpreinstallやpostinstallといった「ライフサイクルスクリプト」が別途の承認手続きなしに自動実行されることが許されている。開発の利便性のための設計だが、同時に攻撃者がコードリポジトリ自体を改ざんせずとも、インストール段階で任意のコードを実行できる経路にもなる。今回の攻撃では、Rustでコンパイルしたネイティブバイナリをウィンドウズ(PE32+)・マック(Mach-O arm64)・リナックス(ELF)用にそれぞれ用意した上で、独自の5バイトのマジックヘッダーの後ろに隠し、.js拡張子のファイルに偽装した。こうすることで静的解析ツールが拡張子だけを見てJavaScriptと誤認しやすくなり、実行時点にはすでにOS別バイナリが静かに実行された後になる。</p>
<p class="es">El ecosistema de npm permite que scripts de ciclo de vida como preinstall y postinstall se ejecuten automáticamente al instalar un paquete, sin un paso de aprobación separado. Es una comodidad para los desarrolladores, pero también le da a un atacante un canal para ejecutar código arbitrario en el momento de la instalación sin siquiera tocar el repositorio de código. En este ataque, se prepararon binarios nativos compilados en Rust por separado para Windows (PE32+), macOS (Mach-O arm64) y Linux (ELF), luego se ocultaron tras un encabezado mágico personalizado de 5 bytes y se disfrazaron como un archivo .js. Eso facilita que las herramientas de análisis estático confundan el archivo con JavaScript solo por su extensión, y para cuando alguien mira más de cerca, el binario específico del sistema operativo ya se ha ejecutado en silencio.</p>
<p class="de">Das npm-Ökosystem erlaubt es, dass Lifecycle-Skripte wie preinstall und postinstall bei der Installation eines Pakets automatisch ausgeführt werden, ohne separaten Freigabeschritt. Das ist praktisch für Entwickler, gibt einem Angreifer aber auch einen Kanal, um zur Installationszeit beliebigen Code auszuführen, ohne je das Code-Repository selbst anzutasten. Bei diesem Angriff wurden in Rust kompilierte native Binärdateien getrennt für Windows (PE32+), macOS (Mach-O arm64) und Linux (ELF) vorbereitet, dann hinter einem benutzerdefinierten 5-Byte-Magic-Header versteckt und als .js-Datei getarnt. Das macht es statischen Analysetools leicht, die Datei allein anhand ihrer Erweiterung für JavaScript zu halten — und bis jemand genauer hinsieht, ist die betriebssystemspezifische Binärdatei bereits still ausgeführt worden.</p>
<p class="fr">L'écosystème npm permet aux scripts de cycle de vie comme preinstall et postinstall de s'exécuter automatiquement lors de l'installation d'un paquet, sans étape d'approbation distincte. C'est pratique pour les développeurs, mais cela offre aussi à un attaquant un canal pour exécuter du code arbitraire au moment de l'installation, sans jamais toucher au dépôt de code lui-même. Dans cette attaque, des binaires natifs compilés en Rust ont été préparés séparément pour Windows (PE32+), macOS (Mach-O arm64) et Linux (ELF), puis dissimulés derrière un en-tête magique personnalisé de 5 octets et déguisés en fichier .js. Cela facilite la confusion, par les outils d'analyse statique, entre ce fichier et du JavaScript sur la seule base de son extension — et le temps que quelqu'un y regarde de plus près, le binaire spécifique au système d'exploitation s'est déjà exécuté silencieusement.</p>
<p class="pt">O ecossistema npm permite que scripts de ciclo de vida como preinstall e postinstall sejam executados automaticamente ao instalar um pacote, sem uma etapa de aprovação separada. É uma conveniência para desenvolvedores, mas também dá a um atacante um canal para executar código arbitrário no momento da instalação sem sequer tocar no repositório de código. Neste ataque, binários nativos compilados em Rust foram preparados separadamente para Windows (PE32+), macOS (Mach-O arm64) e Linux (ELF), depois escondidos atrás de um cabeçalho mágico personalizado de 5 bytes e disfarçados como um arquivo .js. Isso facilita que ferramentas de análise estática confundam o arquivo com JavaScript apenas pela extensão — e, quando alguém olha mais de perto, o binário específico do sistema operacional já foi executado silenciosamente.</p>
<p class="tr">npm ekosistemi, bir paket kurulurken preinstall ve postinstall gibi "yaşam döngüsü betiklerinin" ayrı bir onay adımı olmadan otomatik olarak çalışmasına izin verir. Bu, geliştiriciler için bir kolaylıktır, ancak aynı zamanda bir saldırgana kod deposunun kendisine hiç dokunmadan kurulum aşamasında keyfi kod çalıştırma imkanı verir. Bu saldırıda, Rust ile derlenmiş yerel ikili dosyalar Windows (PE32+), macOS (Mach-O arm64) ve Linux (ELF) için ayrı ayrı hazırlandı, ardından özel 5 baytlık bir sihirli başlığın arkasına gizlendi ve bir .js dosyası gibi gösterildi. Bu, statik analiz araçlarının dosyayı yalnızca uzantısına bakarak JavaScript sanmasını kolaylaştırır — ve biri daha yakından bakana kadar, işletim sistemine özgü ikili dosya çoktan sessizce çalıştırılmış olur.</p>
<p class="vi">Hệ sinh thái npm cho phép các tập lệnh vòng đời như preinstall và postinstall tự động chạy khi cài đặt một gói, không qua bước phê duyệt riêng. Đây là sự tiện lợi cho nhà phát triển, nhưng đồng thời cũng tạo ra một kênh để kẻ tấn công thực thi mã tùy ý ngay tại thời điểm cài đặt mà không cần đụng đến kho mã nguồn. Trong cuộc tấn công này, các tệp nhị phân gốc được biên dịch bằng Rust đã được chuẩn bị riêng cho Windows (PE32+), macOS (Mach-O arm64) và Linux (ELF), sau đó được giấu sau một tiêu đề ma thuật 5 byte tùy chỉnh và ngụy trang thành tệp .js. Điều này khiến các công cụ phân tích tĩnh dễ nhầm tệp này là JavaScript chỉ dựa vào phần mở rộng — và đến khi ai đó xem xét kỹ hơn, tệp nhị phân dành riêng cho hệ điều hành đã âm thầm chạy xong.</p>
<p class="id">Ekosistem npm memungkinkan skrip siklus hidup seperti preinstall dan postinstall berjalan otomatis saat sebuah paket diinstal, tanpa langkah persetujuan terpisah. Ini adalah kemudahan bagi pengembang, tetapi juga memberi penyerang saluran untuk mengeksekusi kode arbitrer pada saat instalasi tanpa pernah menyentuh repositori kode itu sendiri. Dalam serangan ini, biner native hasil kompilasi Rust disiapkan secara terpisah untuk Windows (PE32+), macOS (Mach-O arm64), dan Linux (ELF), lalu disembunyikan di balik header ajaib 5-byte kustom dan disamarkan sebagai file .js. Hal ini memudahkan alat analisis statis salah mengira file tersebut sebagai JavaScript hanya berdasarkan ekstensinya — dan pada saat seseorang memeriksa lebih dekat, biner khusus OS tersebut sudah berjalan diam-diam.</p>
<p class="pl">Ekosystem npm pozwala, by skrypty cyklu życia takie jak preinstall i postinstall uruchamiały się automatycznie podczas instalacji pakietu, bez osobnego kroku zatwierdzania. To wygoda dla deweloperów, ale jednocześnie daje atakującemu kanał do wykonania dowolnego kodu w momencie instalacji, bez dotykania samego repozytorium kodu. W tym ataku natywne binaria skompilowane w Rust zostały przygotowane osobno dla Windows (PE32+), macOS (Mach-O arm64) i Linuksa (ELF), a następnie ukryte za niestandardowym 5-bajtowym nagłówkiem magicznym i zamaskowane jako plik .js. Ułatwia to narzędziom analizy statycznej pomylenie pliku z JavaScript wyłącznie na podstawie rozszerzenia — a zanim ktoś przyjrzy się dokładniej, binarny plik specyficzny dla systemu operacyjnego już zdążył się cicho uruchomić.</p>
<p class="it">L'ecosistema npm consente agli script del ciclo di vita come preinstall e postinstall di essere eseguiti automaticamente all'installazione di un pacchetto, senza un passaggio di approvazione separato. È una comodità per gli sviluppatori, ma offre anche a un attaccante un canale per eseguire codice arbitrario al momento dell'installazione senza mai toccare il repository di codice stesso. In questo attacco, binari nativi compilati in Rust sono stati preparati separatamente per Windows (PE32+), macOS (Mach-O arm64) e Linux (ELF), poi nascosti dietro un header magico personalizzato di 5 byte e camuffati da file .js. Ciò rende facile per gli strumenti di analisi statica scambiare il file per JavaScript basandosi solo sull'estensione — e quando qualcuno guarda più da vicino, il binario specifico del sistema operativo è già stato eseguito silenziosamente.</p>
<p class="ru">Экосистема npm позволяет скриптам жизненного цикла, таким как preinstall и postinstall, запускаться автоматически при установке пакета без отдельного этапа одобрения. Это удобно для разработчиков, но также даёт злоумышленнику канал для выполнения произвольного кода в момент установки, вообще не касаясь самого репозитория кода. В этой атаке нативные бинарные файлы, скомпилированные на Rust, были подготовлены отдельно для Windows (PE32+), macOS (Mach-O arm64) и Linux (ELF), а затем спрятаны за нестандартным 5-байтовым «магическим» заголовком и замаскированы под файл .js. Это позволяет инструментам статического анализа легко принять файл за JavaScript лишь по его расширению — и к тому моменту, когда кто-то присмотрится внимательнее, специфичный для ОС бинарник уже успевает тихо выполниться.</p>
<p class="zh">npm生態系統允許preinstall與postinstall等生命週期腳本在安裝套件時自動執行,不需要另外的核准步驟。這對開發者而言是一種便利,但也給了攻擊者一個管道,能在安裝時執行任意程式碼,而完全不需要碰觸程式碼儲存庫本身。在這次攻擊中,以Rust編譯的原生二進位檔分別為Windows(PE32+)、macOS(Mach-O arm64)與Linux(ELF)準備,接著被隱藏在自訂的5位元組魔術標頭之後,並偽裝成.js檔案。這使得靜態分析工具很容易僅憑副檔名就誤判該檔案為JavaScript——等到有人仔細檢查時,該作業系統專屬的二進位檔早已悄悄執行完畢。</p>

<p class="ko">암호화폐 생태계에서 npm 공급망 공격은 이번이 처음이 아니다. 2018년 이벤트스트림(event-stream) 패키지 사건은 비트코인 지갑 앱 코페이(Copay)가 의존하던 라이브러리를 표적 삼아 니모닉을 훔치려 했고, 2023년 12월 렛저 커넥트 키트(Ledger Connect Kit) 해킹에서는 손상된 npm 패키지가 여러 디파이(DeFi) 프런트엔드에 주소 가로채기 코드를 심어 단 몇 시간 만에 60만 달러 이상을 빼돌렸다. 다만 두 사례는 웹사이트에 접속한 최종 이용자의 지갑 서명 요청을 가로채는 '클라이언트 측' 공격이었던 반면, 이번 jscrambler 사건은 그 자체로 개발자의 로컬 머신을 직접 노렸다는 점에서 다르다. 코드가 프로덕션에 배포되기도 전, 개발 단계에서 곧바로 탈취가 이뤄지는 구조인 셈이다.</p>
<p class="en">This isn't the first npm supply-chain attack aimed at the crypto ecosystem. The 2018 event-stream incident targeted a library that the Bitcoin wallet app Copay depended on, attempting to steal seed phrases, while the December 2023 Ledger Connect Kit hack saw a compromised npm package inject address-hijacking code into multiple DeFi frontends, draining more than $600,000 within hours. Both of those, though, were "client-side" attacks that intercepted wallet-signing requests from end users visiting a website. The jscrambler incident is different in that it targets a developer's local machine directly — the theft happens at the development stage, before code is ever deployed to production.</p>
<p class="ja">暗号資産エコシステムを狙ったnpmサプライチェーン攻撃はこれが初めてではない。2018年のevent-stream事件は、ビットコインウォレットアプリCopayが依存していたライブラリを標的にシードフレーズを盗もうとし、2023年12月のLedger Connect Kitハッキングでは、侵害されたnpmパッケージが複数のDeFiフロントエンドにアドレス乗っ取りコードを仕込み、わずか数時間で60万ドル超を流出させた。ただ両事例は、ウェブサイトにアクセスしたエンドユーザーのウォレット署名リクエストを傍受する「クライアント側」攻撃だった一方、今回のjscrambler事件は開発者のローカルマシン自体を直接狙った点で異なる。コードがプロダクションに配布される前、開発段階でそのまま窃取が行われる構造なのだ。</p>
<p class="es">Este no es el primer ataque a la cadena de suministro de npm dirigido al ecosistema cripto. El incidente de event-stream en 2018 apuntó a una biblioteca de la que dependía la app de wallet de bitcoin Copay, intentando robar frases semilla, mientras que el hackeo de Ledger Connect Kit en diciembre de 2023 vio cómo un paquete npm comprometido inyectaba código de secuestro de direcciones en múltiples frontends de DeFi, drenando más de 600.000 dólares en cuestión de horas. Sin embargo, ambos fueron ataques del "lado del cliente" que interceptaban solicitudes de firma de wallet de usuarios finales que visitaban un sitio web. El incidente de jscrambler es distinto porque apunta directamente a la máquina local de un desarrollador: el robo ocurre en la etapa de desarrollo, antes de que el código llegue siquiera a producción.</p>
<p class="de">Dies ist nicht der erste auf das Krypto-Ökosystem abzielende npm-Lieferkettenangriff. Der event-stream-Vorfall von 2018 zielte auf eine Bibliothek ab, von der die Bitcoin-Wallet-App Copay abhing, um Seed-Phrasen zu stehlen, während beim Ledger-Connect-Kit-Hack im Dezember 2023 ein kompromittiertes npm-Paket Adress-Hijacking-Code in mehrere DeFi-Frontends einschleuste und innerhalb von Stunden über 600.000 Dollar abzog. Beide waren jedoch "clientseitige" Angriffe, die Wallet-Signaturanfragen von Endnutzern abfingen, die eine Website besuchten. Der jscrambler-Vorfall unterscheidet sich dadurch, dass er direkt auf die lokale Maschine eines Entwicklers abzielt — der Diebstahl geschieht bereits in der Entwicklungsphase, bevor Code je in die Produktion gelangt.</p>
<p class="fr">Ce n'est pas la première attaque de la chaîne d'approvisionnement npm visant l'écosystème crypto. L'incident event-stream de 2018 a ciblé une bibliothèque dont dépendait l'application de wallet bitcoin Copay, tentant de voler des phrases de récupération, tandis que le piratage de Ledger Connect Kit en décembre 2023 a vu un paquet npm compromis injecter du code de détournement d'adresses dans plusieurs frontends DeFi, drainant plus de 600 000 dollars en quelques heures. Ces deux cas étaient toutefois des attaques « côté client » interceptant les demandes de signature de wallet d'utilisateurs finaux visitant un site web. L'incident jscrambler diffère en ce qu'il cible directement la machine locale d'un développeur — le vol se produit dès la phase de développement, avant même que le code ne soit déployé en production.</p>
<p class="pt">Este não é o primeiro ataque à cadeia de suprimentos do npm voltado ao ecossistema cripto. O incidente event-stream de 2018 mirou uma biblioteca da qual o aplicativo de carteira de bitcoin Copay dependia, tentando roubar frases-semente, enquanto o hack do Ledger Connect Kit em dezembro de 2023 viu um pacote npm comprometido injetar código de sequestro de endereços em múltiplos frontends de DeFi, drenando mais de US$ 600 mil em questão de horas. Ambos, porém, foram ataques do "lado do cliente" que interceptavam solicitações de assinatura de carteira de usuários finais visitando um site. O incidente do jscrambler é diferente por mirar diretamente a máquina local de um desenvolvedor — o roubo ocorre na etapa de desenvolvimento, antes mesmo de o código ser implantado em produção.</p>
<p class="tr">Bu, kripto ekosistemini hedef alan ilk npm tedarik zinciri saldırısı değil. 2018'deki event-stream olayı, Bitcoin cüzdan uygulaması Copay'ın bağımlı olduğu bir kütüphaneyi hedef alarak kurtarma ifadelerini çalmaya çalışmıştı; Aralık 2023'teki Ledger Connect Kit saldırısında ise ele geçirilmiş bir npm paketi, birden fazla DeFi ön yüzüne adres ele geçirme kodu enjekte ederek saatler içinde 600.000 doların üzerinde varlığı boşalttı. Ancak her iki durum da, bir web sitesini ziyaret eden son kullanıcıların cüzdan imzalama isteklerini yakalayan "istemci tarafı" saldırılarıydı. jscrambler olayı ise doğrudan bir geliştiricinin yerel makinesini hedef alması bakımından farklı — hırsızlık, kod henüz üretime bile dağıtılmadan, geliştirme aşamasında gerçekleşiyor.</p>
<p class="vi">Đây không phải là cuộc tấn công chuỗi cung ứng npm đầu tiên nhắm vào hệ sinh thái crypto. Sự cố event-stream năm 2018 nhắm vào một thư viện mà ứng dụng ví bitcoin Copay phụ thuộc, cố gắng đánh cắp cụm từ khôi phục, trong khi vụ hack Ledger Connect Kit tháng 12/2023 chứng kiến một gói npm bị xâm phạm cài mã chiếm đoạt địa chỉ vào nhiều giao diện DeFi, rút hơn 600.000 đô la chỉ trong vài giờ. Tuy nhiên, cả hai đều là các cuộc tấn công "phía máy khách" chặn các yêu cầu ký ví từ người dùng cuối truy cập một trang web. Sự cố jscrambler khác ở chỗ nó nhắm trực tiếp vào máy cục bộ của nhà phát triển — việc đánh cắp xảy ra ngay ở giai đoạn phát triển, trước khi mã được triển khai vào sản xuất.</p>
<p class="id">Ini bukan serangan rantai pasok npm pertama yang menyasar ekosistem kripto. Insiden event-stream pada 2018 menyasar sebuah pustaka yang menjadi ketergantungan aplikasi dompet Bitcoin Copay, dalam upaya mencuri seed phrase, sementara peretasan Ledger Connect Kit pada Desember 2023 melibatkan paket npm yang disusupi menyisipkan kode pembajakan alamat ke berbagai frontend DeFi, menguras lebih dari $600.000 hanya dalam hitungan jam. Namun, keduanya adalah serangan "sisi klien" yang mencegat permintaan penandatanganan dompet dari pengguna akhir yang mengunjungi sebuah situs web. Insiden jscrambler berbeda karena menyasar langsung mesin lokal seorang pengembang — pencurian terjadi pada tahap pengembangan, sebelum kode bahkan diterapkan ke produksi.</p>
<p class="pl">To nie pierwszy atak na łańcuch dostaw npm wymierzony w ekosystem kryptowalut. Incydent event-stream z 2018 roku dotyczył biblioteki, od której zależała aplikacja portfela bitcoin Copay, w próbie kradzieży fraz seed, natomiast włamanie do Ledger Connect Kit w grudniu 2023 roku polegało na tym, że przejęty pakiet npm wstrzykiwał kod przechwytujący adresy do wielu frontendów DeFi, wysysając ponad 600 000 dolarów w ciągu kilku godzin. Oba te przypadki były jednak atakami "po stronie klienta", przechwytującymi żądania podpisu portfela od użytkowników końcowych odwiedzających stronę internetową. Incydent jscrambler różni się tym, że atakuje bezpośrednio lokalną maszynę dewelopera — kradzież następuje na etapie developmentu, zanim kod w ogóle trafi na produkcję.</p>
<p class="it">Questo non è il primo attacco alla supply chain di npm rivolto all'ecosistema crypto. L'incidente event-stream del 2018 ha preso di mira una libreria da cui dipendeva l'app wallet bitcoin Copay, nel tentativo di rubare seed phrase, mentre l'attacco a Ledger Connect Kit del dicembre 2023 ha visto un pacchetto npm compromesso iniettare codice di dirottamento degli indirizzi in molteplici frontend DeFi, prosciugando oltre 600.000 dollari nel giro di poche ore. Entrambi, tuttavia, erano attacchi "lato client" che intercettavano le richieste di firma del wallet da parte degli utenti finali che visitavano un sito web. L'incidente jscrambler è diverso perché prende di mira direttamente la macchina locale di uno sviluppatore — il furto avviene nella fase di sviluppo, prima ancora che il codice venga distribuito in produzione.</p>
<p class="ru">Это не первая атака на цепочку поставок npm, нацеленная на криптоэкосистему. Инцидент с event-stream в 2018 году был нацелен на библиотеку, от которой зависело приложение биткоин-кошелька Copay, с попыткой украсть seed-фразы, а взлом Ledger Connect Kit в декабре 2023 года привёл к тому, что скомпрометированный npm-пакет внедрил код перехвата адресов в несколько DeFi-фронтендов, выведя более 600 000 долларов за считаные часы. Однако оба этих случая были атаками «на стороне клиента», перехватывавшими запросы на подпись кошелька от конечных пользователей, посещавших сайт. Инцидент с jscrambler отличается тем, что он напрямую нацелен на локальную машину разработчика — кража происходит ещё на стадии разработки, до того как код вообще попадает в production.</p>
<p class="zh">這並非首次針對加密貨幣生態系統的npm供應鏈攻擊。2018年的event-stream事件鎖定了比特幣錢包應用程式Copay所依賴的一個函式庫,企圖竊取助記詞;而2023年12月的Ledger Connect Kit駭客事件中,一個遭入侵的npm套件將劫持位址的程式碼注入多個DeFi前端,在數小時內盜走超過60萬美元。不過,這兩起事件都屬於「客戶端」攻擊,攔截的是造訪網站的終端使用者的錢包簽署請求。jscrambler事件的不同之處在於,它直接鎖定開發者的本機電腦——竊取行為發生在開發階段,早於程式碼真正部署到正式環境之前。</p>

<h2 class="ko">니모닉 탈취가 유독 치명적인 이유 — 지금 지켜봐야 할 것</h2>
<h2 class="en">Why stealing a seed phrase is especially devastating — and what to watch now</h2>
<h2 class="ja">シードフレーズの窃取が特に致命的な理由 — 今後注視すべきこと</h2>
<h2 class="es">Por qué robar una frase semilla es especialmente devastador, y qué vigilar ahora</h2>
<h2 class="de">Warum der Diebstahl einer Seed-Phrase besonders verheerend ist — und worauf jetzt zu achten ist</h2>
<h2 class="fr">Pourquoi voler une phrase de récupération est particulièrement dévastateur — et quoi surveiller maintenant</h2>
<h2 class="pt">Por que roubar uma frase-semente é especialmente devastador — e o que observar agora</h2>
<h2 class="tr">Bir kurtarma ifadesini çalmak neden özellikle yıkıcı — ve şimdi izlenmesi gerekenler</h2>
<h2 class="vi">Vì sao đánh cắp cụm từ khôi phục đặc biệt tàn khốc — và điều cần theo dõi lúc này</h2>
<h2 class="id">Mengapa mencuri seed phrase sangat menghancurkan — dan apa yang perlu diperhatikan sekarang</h2>
<h2 class="pl">Dlaczego kradzież frazy seed jest wyjątkowo niszcząca — i na co teraz uważać</h2>
<h2 class="it">Perché rubare una seed phrase è particolarmente devastante — e cosa osservare ora</h2>
<h2 class="ru">Почему кража seed-фразы особенно разрушительна — и на что обратить внимание сейчас</h2>
<h2 class="zh">為何竊取助記詞的破壞力格外驚人——以及現在該關注什麼</h2>

<p class="ko">비밀번호나 API 키가 유출되면 즉시 폐기하고 새로 발급받으면 된다. 하지만 니모닉 구문은 다르다. 한 번 유출되면 그 구문에서 파생되는 모든 주소에 대한 영구적이고 완전한 통제권이 공격자에게 넘어가며, 이용자가 나중에 새 기기에서 지갑을 재설정하더라도 이미 노출된 자금은 공격자가 자동화 스크립트로 즉시 쓸어갈 수 있다. 되돌릴 수 없다는 점에서 성격이 전혀 다른 피해다. 여기에 더해 이번 공격은 AWS·애저·구글클라우드 인증정보까지 노렸는데, 이는 감염된 개발자의 컴퓨터가 그 개발자가 관리하는 다른 패키지나 저장소로 공격이 번지는 '2차 공급망 공격'의 발판이 될 수 있다는 뜻이어서 피해 범위를 가늠하기 더 어렵게 만든다.</p>
<p class="en">A leaked password or API key can simply be revoked and reissued. A seed phrase is different. Once it's exfiltrated, the attacker gains permanent, complete control over every address derived from it — and even if a user later resets their wallet on a fresh device, any funds already exposed can be swept instantly by an automated script. That irreversibility makes this a fundamentally different kind of damage. On top of that, this attack also went after AWS, Azure, and Google Cloud credentials, meaning an infected developer's machine could become the launchpad for a "second-order" supply-chain attack against other packages or repositories that developer maintains — making the true scope of the damage harder to pin down.</p>
<p class="ja">パスワードやAPIキーが流出した場合は、即座に無効化して新規発行すればよい。しかしシードフレーズは違う。一度流出すれば、その語句から派生するすべてのアドレスに対する永続的かつ完全な支配権が攻撃者に渡り、利用者が後で新しい端末でウォレットを再設定しても、すでに露出した資金は攻撃者が自動化スクリプトで即座に一掃できる。取り返しがつかないという点で、まったく性質の異なる被害だ。さらに今回の攻撃はAWS・Azure・Google Cloudの認証情報まで狙っており、これは感染した開発者のコンピューターが、その開発者が管理する他のパッケージやリポジトリへ攻撃が広がる「二次的な供給網攻撃」の足がかりになりうることを意味し、被害範囲をさらに測りづらくしている。</p>
<p class="es">Una contraseña o clave de API filtrada simplemente se puede revocar y reemitir. Una frase semilla es diferente. Una vez exfiltrada, el atacante obtiene un control permanente y completo sobre cada dirección derivada de ella, e incluso si un usuario restablece luego su wallet en un dispositivo nuevo, cualquier fondo ya expuesto puede ser vaciado al instante por un script automatizado. Esa irreversibilidad convierte esto en un tipo de daño fundamentalmente distinto. Además, este ataque también fue tras credenciales de AWS, Azure y Google Cloud, lo que significa que la máquina infectada de un desarrollador podría convertirse en la plataforma de lanzamiento de un ataque de cadena de suministro "de segundo orden" contra otros paquetes o repositorios que ese desarrollador mantiene, dificultando aún más determinar el verdadero alcance del daño.</p>
<p class="de">Ein durchgesickertes Passwort oder ein API-Schlüssel lässt sich einfach widerrufen und neu ausstellen. Eine Seed-Phrase ist anders. Ist sie einmal exfiltriert, erhält der Angreifer dauerhafte, vollständige Kontrolle über jede daraus abgeleitete Adresse — und selbst wenn ein Nutzer sein Wallet später auf einem neuen Gerät neu einrichtet, können bereits exponierte Gelder von einem automatisierten Skript sofort abgeräumt werden. Diese Unumkehrbarkeit macht dies zu einer grundlegend anderen Art von Schaden. Darüber hinaus zielte dieser Angriff auch auf AWS-, Azure- und Google-Cloud-Zugangsdaten ab, was bedeutet, dass der infizierte Rechner eines Entwicklers zur Startrampe für einen "Angriff zweiter Ordnung" auf andere Pakete oder Repositories werden könnte, die dieser Entwickler pflegt — was das tatsächliche Ausmaß des Schadens schwerer einzugrenzen macht.</p>
<p class="fr">Un mot de passe ou une clé API divulgués peuvent simplement être révoqués et réémis. Une phrase de récupération, c'est différent. Une fois exfiltrée, l'attaquant obtient un contrôle permanent et complet sur chaque adresse qui en dérive — et même si un utilisateur réinitialise ensuite son wallet sur un nouvel appareil, les fonds déjà exposés peuvent être vidés instantanément par un script automatisé. Cette irréversibilité rend ce dommage fondamentalement différent. De plus, cette attaque visait aussi les identifiants AWS, Azure et Google Cloud, ce qui signifie que la machine infectée d'un développeur pourrait devenir le tremplin d'une attaque de chaîne d'approvisionnement « de second ordre » contre d'autres paquets ou dépôts que ce développeur maintient — rendant l'ampleur réelle des dégâts plus difficile à cerner.</p>
<p class="pt">Uma senha ou chave de API vazada pode simplesmente ser revogada e reemitida. Uma frase-semente é diferente. Uma vez exfiltrada, o atacante obtém controle permanente e completo sobre cada endereço derivado dela — e mesmo que um usuário reconfigure depois sua carteira em um dispositivo novo, quaisquer fundos já expostos podem ser varridos instantaneamente por um script automatizado. Essa irreversibilidade torna esse dano fundamentalmente diferente. Além disso, esse ataque também mirou credenciais da AWS, Azure e Google Cloud, o que significa que a máquina infectada de um desenvolvedor pode se tornar a plataforma de lançamento de um ataque de cadeia de suprimentos "de segunda ordem" contra outros pacotes ou repositórios que esse desenvolvedor mantém — tornando o verdadeiro alcance do dano mais difícil de determinar.</p>
<p class="tr">Sızdırılan bir şifre ya da API anahtarı basitçe iptal edilip yeniden verilebilir. Bir kurtarma ifadesi farklıdır. Bir kez sızdırıldığında, saldırgan ondan türeyen her adres üzerinde kalıcı ve tam kontrol elde eder — kullanıcı daha sonra yeni bir cihazda cüzdanını sıfırlasa bile, zaten açığa çıkmış fonlar otomatik bir betik tarafından anında boşaltılabilir. Bu geri döndürülemezlik, bunu temelde farklı türde bir zarar haline getiriyor. Bunun ötesinde, bu saldırı AWS, Azure ve Google Cloud kimlik bilgilerini de hedef aldı; bu da enfekte olmuş bir geliştiricinin bilgisayarının, o geliştiricinin bakımını yaptığı diğer paketlere veya depolara yönelik "ikinci dereceden" bir tedarik zinciri saldırısının fırlatma rampası haline gelebileceği anlamına geliyor — bu da zararın gerçek kapsamını belirlemeyi daha da zorlaştırıyor.</p>
<p class="vi">Một mật khẩu hay khóa API bị rò rỉ có thể đơn giản bị thu hồi và cấp lại. Cụm từ khôi phục thì khác. Một khi đã bị đánh cắp, kẻ tấn công có quyền kiểm soát vĩnh viễn, hoàn toàn đối với mọi địa chỉ bắt nguồn từ nó — và ngay cả khi người dùng sau đó thiết lập lại ví trên một thiết bị mới, số tiền đã bị lộ vẫn có thể bị một kịch bản tự động quét sạch ngay lập tức. Tính không thể đảo ngược này khiến đây là một loại thiệt hại về bản chất khác biệt. Thêm vào đó, cuộc tấn công này còn nhắm vào thông tin xác thực AWS, Azure và Google Cloud, có nghĩa là máy tính bị nhiễm của một nhà phát triển có thể trở thành bàn đạp cho một cuộc tấn công chuỗi cung ứng "bậc hai" nhắm vào các gói hoặc kho lưu trữ khác mà nhà phát triển đó quản lý — khiến phạm vi thiệt hại thực sự khó xác định hơn.</p>
<p class="id">Kata sandi atau kunci API yang bocor cukup dicabut dan diterbitkan ulang. Seed phrase berbeda. Setelah dieksfiltrasi, penyerang memperoleh kendali permanen dan penuh atas setiap alamat yang diturunkan darinya — dan bahkan jika pengguna kemudian mengatur ulang dompetnya di perangkat baru, dana yang sudah terekspos dapat langsung disapu bersih oleh skrip otomatis. Sifat tak dapat diputar balik ini menjadikan kerusakan ini pada dasarnya berbeda jenisnya. Selain itu, serangan ini juga menyasar kredensial AWS, Azure, dan Google Cloud, yang berarti mesin pengembang yang terinfeksi bisa menjadi batu loncatan bagi serangan rantai pasok "orde kedua" terhadap paket atau repositori lain yang dikelola pengembang tersebut — membuat cakupan sebenarnya dari kerusakan ini lebih sulit dipastikan.</p>
<p class="pl">Wyciekłe hasło lub klucz API można po prostu unieważnić i wydać ponownie. Fraza seed jest inna. Gdy zostanie wykradziona, atakujący uzyskuje trwałą, pełną kontrolę nad każdym adresem z niej wyprowadzonym — a nawet jeśli użytkownik później zresetuje swój portfel na nowym urządzeniu, wszelkie już ujawnione środki mogą zostać natychmiast wymiecione przez zautomatyzowany skrypt. Ta nieodwracalność sprawia, że jest to fundamentalnie inny rodzaj szkody. Do tego atak ten sięgnął także po dane uwierzytelniające AWS, Azure i Google Cloud, co oznacza, że zainfekowana maszyna dewelopera mogłaby stać się odskocznią do ataku na łańcuch dostaw "drugiego rzędu" wymierzonego w inne pakiety lub repozytoria utrzymywane przez tego dewelopera — co utrudnia dokładne określenie prawdziwego zakresu szkód.</p>
<p class="it">Una password o una chiave API trapelate possono semplicemente essere revocate e riemesse. Una seed phrase è diversa. Una volta esfiltrata, l'attaccante ottiene il controllo permanente e completo su ogni indirizzo da essa derivato — e anche se un utente in seguito reimposta il proprio wallet su un dispositivo nuovo, eventuali fondi già esposti possono essere prosciugati istantaneamente da uno script automatizzato. Questa irreversibilità rende questo un tipo di danno fondamentalmente diverso. In più, questo attacco ha preso di mira anche le credenziali AWS, Azure e Google Cloud, il che significa che la macchina infetta di uno sviluppatore potrebbe diventare la rampa di lancio per un attacco alla supply chain "di secondo ordine" contro altri pacchetti o repository mantenuti da quello sviluppatore — rendendo più difficile definire la vera portata del danno.</p>
<p class="ru">Утекший пароль или API-ключ можно просто отозвать и выпустить заново. Seed-фраза — другое дело. Как только она украдена, злоумышленник получает постоянный и полный контроль над каждым адресом, производным от неё, — и даже если пользователь позже сбросит свой кошелёк на новом устройстве, уже раскрытые средства могут быть мгновенно выведены автоматизированным скриптом. Эта необратимость делает данный вид ущерба принципиально иным. Вдобавок эта атака также была нацелена на учётные данные AWS, Azure и Google Cloud, а значит, заражённая машина разработчика может стать плацдармом для атаки на цепочку поставок «второго порядка» против других пакетов или репозиториев, которые поддерживает этот разработчик, — что затрудняет точную оценку истинного масштаба ущерба.</p>
<p class="zh">外洩的密碼或API金鑰只需撤銷並重新核發即可。助記詞則不同。一旦外洩,攻擊者就能對由其衍生的每個位址取得永久且完全的控制權——即使使用者之後在新裝置上重設錢包,任何已曝露的資金仍可能被自動化腳本瞬間清空。這種不可逆性使其成為一種本質上截然不同的損害。除此之外,這次攻擊還鎖定了AWS、Azure與Google Cloud的憑證,意味著遭感染的開發者電腦可能成為針對該開發者所維護的其他套件或儲存庫發動「二階」供應鏈攻擊的跳板——使得真正的損害範圍更難以確定。</p>

<p class="ko">지금 시점에서 확인해야 할 것은 세 가지다. 첫째, jscrambler 측이 게시 토큰·계정 접근권 회수를 포함한 전체 사고 경위를 공개하는지 여부다. 둘째, 약 3시간의 배포 창구 동안 8.14.0부터 8.20.0 사이 버전을 설치한 하위 프로젝트가 얼마나 되는지, 그리고 이들이 실제로 통보를 받는지다. 의존성 그래프 특성상 직접 설치자뿐 아니라 이를 다시 의존하는 프로젝트까지 노출됐을 가능성이 있다. 셋째, 해당 시간대에 개발 도구를 설치한 메타마스크·팬텀·이그저더스 이용자의 지갑에서 실제 자금 이동이 온체인에 나타나는지다. 아직 확인된 피해 규모는 공개되지 않았지만, 탈취된 정보가 실제 자금 인출로 이어지는 데는 시차가 있을 수 있어 향후 며칠간의 온체인 모니터링이 중요하다.</p>
<p class="en">Three things bear watching from here. First, whether jscrambler discloses a full post-mortem, including confirmation that publishing tokens and account access were actually revoked. Second, how many downstream projects installed a version between 8.14.0 and 8.20.0 during that roughly three-hour window, and whether they're actually notified — the nature of dependency graphs means exposure could extend beyond direct installers to projects that depend on them in turn. Third, whether on-chain data over the coming days shows actual fund movements from MetaMask, Phantom, or Exodus wallets belonging to developers who installed tooling during that window. No confirmed damage total has been disclosed yet, but there can be a lag between data theft and an actual withdrawal, making on-chain monitoring in the days ahead important.</p>
<p class="ja">今の時点で確認すべきことは3つある。第一に、jscrambler側が配布トークン・アカウントアクセス権の回収を含む事故の全容を公開するかどうかだ。第二に、約3時間の配布期間中に8.14.0から8.20.0の間のバージョンをインストールした下流プロジェクトがどれほどあり、実際に通知を受けるかどうかだ。依存関係グラフの性質上、直接のインストーラーだけでなく、それに再び依存するプロジェクトまで露出した可能性がある。第三に、その時間帯に開発ツールをインストールしたメタマスク・ファントム・エクソダス利用者のウォレットから実際に資金移動がオンチェーンで確認されるかどうかだ。確認された被害規模はまだ公開されていないが、盗まれた情報が実際の資金引き出しにつながるまでには時差があり得るため、今後数日間のオンチェーン監視が重要になる。</p>
<p class="es">A partir de ahora hay tres cosas que vigilar. Primero, si jscrambler divulga un análisis post-mortem completo, incluida la confirmación de que se revocaron efectivamente los tokens de publicación y el acceso a la cuenta. Segundo, cuántos proyectos posteriores instalaron una versión entre 8.14.0 y 8.20.0 durante esa ventana de unas tres horas, y si de verdad se les notifica: la naturaleza de los grafos de dependencias implica que la exposición podría extenderse más allá de quienes instalaron directamente, hacia proyectos que a su vez dependen de ellos. Tercero, si los datos on-chain de los próximos días muestran movimientos reales de fondos desde wallets de MetaMask, Phantom o Exodus pertenecientes a desarrolladores que instalaron herramientas durante esa ventana. Aún no se ha divulgado un total de daños confirmado, pero puede haber un desfase entre el robo de datos y un retiro real, lo que hace importante el monitoreo on-chain en los próximos días.</p>
<p class="de">Von hier an sind drei Dinge zu beobachten. Erstens, ob jscrambler eine vollständige Post-Mortem-Analyse veröffentlicht, einschließlich der Bestätigung, dass Publish-Tokens und Kontozugriff tatsächlich widerrufen wurden. Zweitens, wie viele nachgelagerte Projekte während des rund dreistündigen Zeitfensters eine Version zwischen 8.14.0 und 8.20.0 installiert haben und ob sie tatsächlich benachrichtigt werden — die Natur von Abhängigkeitsgraphen bedeutet, dass die Exponierung über direkte Installateure hinaus auch Projekte betreffen könnte, die wiederum von diesen abhängen. Drittens, ob On-Chain-Daten in den kommenden Tagen tatsächliche Geldbewegungen aus MetaMask-, Phantom- oder Exodus-Wallets von Entwicklern zeigen, die während dieses Zeitfensters Tools installiert haben. Eine bestätigte Schadenssumme wurde noch nicht veröffentlicht, aber zwischen Datendiebstahl und tatsächlicher Abhebung kann eine Verzögerung liegen, was die On-Chain-Überwachung in den kommenden Tagen wichtig macht.</p>
<p class="fr">Trois éléments méritent d'être surveillés à partir de maintenant. Premièrement, si jscrambler publie une analyse post-mortem complète, incluant la confirmation que les jetons de publication et l'accès au compte ont bien été révoqués. Deuxièmement, combien de projets en aval ont installé une version comprise entre 8.14.0 et 8.20.0 pendant cette fenêtre d'environ trois heures, et s'ils sont réellement notifiés — la nature des graphes de dépendances signifie que l'exposition pourrait s'étendre au-delà des installateurs directs, à des projets qui en dépendent à leur tour. Troisièmement, si les données on-chain des prochains jours montrent des mouvements de fonds réels depuis des wallets MetaMask, Phantom ou Exodus appartenant à des développeurs ayant installé des outils pendant cette fenêtre. Aucun montant de dommages confirmé n'a encore été divulgué, mais un décalage peut exister entre le vol de données et un retrait réel, ce qui rend la surveillance on-chain des prochains jours importante.</p>
<p class="pt">A partir de agora, há três coisas a observar. Primeiro, se o jscrambler divulgará uma análise post-mortem completa, incluindo a confirmação de que tokens de publicação e o acesso à conta foram de fato revogados. Segundo, quantos projetos a jusante instalaram uma versão entre 8.14.0 e 8.20.0 durante essa janela de cerca de três horas, e se eles serão de fato notificados — a natureza dos grafos de dependência significa que a exposição pode se estender além dos instaladores diretos, para projetos que por sua vez dependem deles. Terceiro, se os dados on-chain dos próximos dias mostrarão movimentações reais de fundos de carteiras MetaMask, Phantom ou Exodus pertencentes a desenvolvedores que instalaram ferramentas durante essa janela. Nenhum total de danos confirmado foi divulgado até agora, mas pode haver um intervalo entre o roubo de dados e uma retirada real, tornando importante o monitoramento on-chain nos próximos dias.</p>
<p class="tr">Bundan sonra izlenmesi gereken üç şey var. Birincisi, jscrambler'ın yayınlama belirteçlerinin ve hesap erişiminin gerçekten iptal edildiğinin doğrulanması da dahil olmak üzere tam bir olay sonrası analiz yayınlayıp yayınlamayacağı. İkincisi, yaklaşık üç saatlik pencere boyunca kaç alt projenin 8.14.0 ile 8.20.0 arasında bir sürüm kurduğu ve bunların gerçekten bilgilendirilip bilgilendirilmeyeceği — bağımlılık grafiklerinin doğası, maruziyetin doğrudan kurulum yapanların ötesine, onlara bağımlı olan projelere kadar uzanabileceği anlamına geliyor. Üçüncüsü, önümüzdeki günlerdeki zincir üstü verilerin, bu pencere sırasında araç kuran geliştiricilere ait MetaMask, Phantom veya Exodus cüzdanlarından gerçek fon hareketlerini gösterip göstermeyeceği. Henüz doğrulanmış bir zarar toplamı açıklanmadı, ancak veri hırsızlığı ile gerçek bir para çekme arasında bir gecikme olabilir, bu da önümüzdeki günlerde zincir üstü izlemeyi önemli kılıyor.</p>
<p class="vi">Từ đây có ba điều cần theo dõi. Thứ nhất, liệu jscrambler có công bố báo cáo hậu kiểm đầy đủ hay không, bao gồm xác nhận rằng token phát hành và quyền truy cập tài khoản đã thực sự bị thu hồi. Thứ hai, có bao nhiêu dự án hạ nguồn đã cài đặt một phiên bản từ 8.14.0 đến 8.20.0 trong khoảng cửa sổ ba giờ đó, và liệu họ có thực sự được thông báo hay không — bản chất của đồ thị phụ thuộc có nghĩa là mức độ phơi nhiễm có thể vượt ra ngoài những người cài đặt trực tiếp, đến cả các dự án phụ thuộc vào chúng. Thứ ba, liệu dữ liệu on-chain trong những ngày tới có cho thấy các dịch chuyển tiền thực tế từ ví MetaMask, Phantom hay Exodus của các nhà phát triển đã cài đặt công cụ trong khoảng thời gian đó hay không. Chưa có tổng thiệt hại được xác nhận công bố, nhưng có thể có độ trễ giữa việc đánh cắp dữ liệu và một lần rút tiền thực tế, khiến việc giám sát on-chain trong những ngày tới trở nên quan trọng.</p>
<p class="id">Ada tiga hal yang perlu diperhatikan mulai sekarang. Pertama, apakah jscrambler akan mengungkap analisis pasca-insiden secara lengkap, termasuk konfirmasi bahwa token publikasi dan akses akun benar-benar telah dicabut. Kedua, berapa banyak proyek hilir yang menginstal versi antara 8.14.0 dan 8.20.0 selama jendela waktu sekitar tiga jam itu, dan apakah mereka benar-benar diberitahu — sifat graf dependensi berarti paparan bisa meluas melampaui yang menginstal langsung hingga ke proyek-proyek yang bergantung pada mereka. Ketiga, apakah data on-chain dalam beberapa hari ke depan menunjukkan pergerakan dana yang sebenarnya dari dompet MetaMask, Phantom, atau Exodus milik pengembang yang menginstal alat tersebut selama jendela waktu itu. Belum ada total kerugian yang dikonfirmasi diungkapkan, tetapi bisa ada jeda waktu antara pencurian data dan penarikan dana yang sebenarnya, sehingga membuat pemantauan on-chain di hari-hari mendatang menjadi penting.</p>
<p class="pl">Od teraz warto obserwować trzy rzeczy. Po pierwsze, czy jscrambler ujawni pełną analizę post-mortem, w tym potwierdzenie, że tokeny publikacji i dostęp do konta zostały faktycznie odwołane. Po drugie, ile projektów niższego szczebla zainstalowało wersję między 8.14.0 a 8.20.0 w trakcie tego około trzygodzinnego okna czasowego i czy zostaną one faktycznie powiadomione — charakter grafów zależności oznacza, że narażenie może wykraczać poza bezpośrednich instalujących, obejmując projekty, które z kolei od nich zależą. Po trzecie, czy dane on-chain w najbliższych dniach pokażą faktyczne przepływy środków z portfeli MetaMask, Phantom lub Exodus należących do deweloperów, którzy zainstalowali narzędzie w tym okresie. Nie ujawniono jeszcze potwierdzonej sumy strat, ale między kradzieżą danych a faktyczną wypłatą może wystąpić opóźnienie, co sprawia, że monitorowanie on-chain w nadchodzących dniach jest ważne.</p>
<p class="it">Da qui in avanti ci sono tre cose da osservare. Primo, se jscrambler renderà pubblica un'analisi post-mortem completa, inclusa la conferma che i token di pubblicazione e l'accesso all'account siano stati effettivamente revocati. Secondo, quanti progetti a valle abbiano installato una versione compresa tra 8.14.0 e 8.20.0 durante quella finestra di circa tre ore, e se vengano effettivamente avvisati — la natura dei grafi di dipendenza implica che l'esposizione potrebbe estendersi oltre chi ha installato direttamente, fino ai progetti che a loro volta dipendono da essi. Terzo, se i dati on-chain nei prossimi giorni mostreranno movimenti di fondi reali da wallet MetaMask, Phantom o Exodus appartenenti a sviluppatori che hanno installato lo strumento durante quella finestra. Non è stato ancora divulgato un totale dei danni confermato, ma può esserci un ritardo tra il furto dei dati e un prelievo effettivo, il che rende importante il monitoraggio on-chain nei giorni a venire.</p>
<p class="ru">С этого момента стоит следить за тремя вещами. Во-первых, раскроет ли jscrambler полный пост-анализ инцидента, включая подтверждение того, что токены публикации и доступ к аккаунту были действительно отозваны. Во-вторых, сколько нижестоящих проектов установили версию между 8.14.0 и 8.20.0 в течение того примерно трёхчасового окна и будут ли они действительно уведомлены — природа графов зависимостей означает, что уязвимость может выходить за пределы прямых установщиков и затрагивать проекты, которые, в свою очередь, зависят от них. В-третьих, покажут ли ончейн-данные в ближайшие дни фактическое движение средств из кошельков MetaMask, Phantom или Exodus, принадлежащих разработчикам, которые устанавливали инструмент в это окно. Подтверждённая общая сумма ущерба пока не раскрыта, но между кражей данных и фактическим выводом средств может быть задержка, что делает мониторинг ончейн-данных в ближайшие дни важным.</p>
<p class="zh">從現在起有三件事值得關注。第一,jscrambler是否會公布完整的事後分析報告,包括確認發布權杖與帳號存取權限確實已被撤銷。第二,在那約三小時的視窗期間,有多少下游專案安裝了8.14.0到8.20.0之間的版本,以及他們是否真的收到通知——依賴關係圖的特性意味著曝險範圍可能不僅限於直接安裝者,還可能擴及依賴這些專案的其他專案。第三,未來數日的鏈上資料是否會顯示在該視窗期間安裝工具的開發者所屬的MetaMask、Phantom或Exodus錢包出現實際資金移動。目前尚未公布經確認的損失總額,但資料竊取與實際提領之間可能存在時間差,這使得未來數日的鏈上監控格外重要。</p>

<div class="ko">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">jscrambler npm 배포 타임라인 (7월11일, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">악성 배포</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">정상 복구</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">재감염</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18시대</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">총 5개 악성 버전, 약 3시간 동안 정상/악성 교차 배포</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">악성 버전 (프리인스톨 훅 활성)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">정상 버전 (훅 제거)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">The Hacker News, StepSecurity, SafeDep 보도 기준 재구성. 시각은 협정세계시(UTC).</p>
</div>
<div class="en">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">jscrambler npm release timeline (Jul 11, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">malicious</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">clean fix</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">re-infected</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:xx</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">5 malicious versions total, alternating with clean ones over ~3 hours</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Malicious (preinstall hook active)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Clean (hook removed)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Reconstructed from reporting by The Hacker News, StepSecurity, and SafeDep. Times in UTC.</p>
</div>
<div class="ja">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">jscrambler npm配布タイムライン(7月11日、UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">悪性配布</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">正常復旧</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">再感染</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18時台</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">計5つの悪性バージョン、約3時間で正常・悪性が交互に配布</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">悪性バージョン(プリインストールフック有効)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">正規バージョン(フック除去)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">The Hacker News、StepSecurity、SafeDepの報道をもとに再構成。時刻は協定世界時(UTC)。</p>
</div>
<div class="es">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Cronología de lanzamientos npm de jscrambler (11 jul, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">malicioso</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">limpio</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">reinfectado</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18h</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">5 versiones maliciosas en total, alternadas con limpias en ~3 horas</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Maliciosa (hook preinstall activo)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Limpia (hook eliminado)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Reconstruido a partir de la cobertura de The Hacker News, StepSecurity y SafeDep. Horas en UTC.</p>
</div>
<div class="de">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">jscrambler npm-Release-Zeitleiste (11. Juli, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">bösartig</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">saubere Fix</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">reinfiziert</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18 Uhr</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">Insgesamt 5 bösartige Versionen, ~3 Stunden im Wechsel mit sauberen</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Bösartig (Preinstall-Hook aktiv)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Sauber (Hook entfernt)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Rekonstruiert aus Berichten von The Hacker News, StepSecurity und SafeDep. Zeiten in UTC.</p>
</div>
<div class="fr">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Chronologie des versions npm jscrambler (11 juil., UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">malveillant</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15h12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">correction saine</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17h07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">réinfecté</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17h26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18h</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">5 versions malveillantes au total, alternées sur ~3 heures</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Malveillante (hook preinstall actif)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Saine (hook supprimé)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Reconstitué à partir des articles de The Hacker News, StepSecurity et SafeDep. Heures en UTC.</p>
</div>
<div class="pt">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Linha do tempo de lançamentos npm do jscrambler (11 jul, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">maliciosa</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15h12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">correção limpa</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17h07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">reinfectada</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17h26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18h</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">5 versões maliciosas ao todo, alternadas com limpas por ~3 horas</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Maliciosa (hook preinstall ativo)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Limpa (hook removido)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Reconstruído a partir da cobertura de The Hacker News, StepSecurity e SafeDep. Horários em UTC.</p>
</div>
<div class="tr">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">jscrambler npm sürüm zaman çizelgesi (11 Tem, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">kötü amaçlı</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">temiz düzeltme</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">yeniden bulaştı</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:00 civarı</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">Toplam 5 kötü amaçlı sürüm, ~3 saat boyunca temizle sırayla</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Kötü amaçlı (preinstall kancası aktif)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Temiz (kanca kaldırıldı)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">The Hacker News, StepSecurity ve SafeDep haberlerinden yeniden oluşturulmuştur. Saatler UTC.</p>
</div>
<div class="vi">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Dòng thời gian phát hành npm của jscrambler (11/7, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">độc hại</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">bản vá sạch</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">tái nhiễm</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18 giờ</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">Tổng cộng 5 phiên bản độc hại, xen kẽ bản sạch trong ~3 giờ</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Độc hại (móc preinstall còn hoạt động)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Sạch (đã gỡ móc gọi)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Được dựng lại từ thông tin của The Hacker News, StepSecurity và SafeDep. Giờ theo UTC.</p>
</div>
<div class="id">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Linimasa rilis npm jscrambler (11 Jul, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">berbahaya</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">perbaikan bersih</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">terinfeksi ulang</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:xx</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">Total 5 versi berbahaya, berselang-seling dengan versi bersih selama ~3 jam</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Berbahaya (hook preinstall aktif)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Bersih (hook dihapus)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Direkonstruksi dari laporan The Hacker News, StepSecurity, dan SafeDep. Waktu dalam UTC.</p>
</div>
<div class="pl">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Oś czasu wydań npm jscrambler (11 lip, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">złośliwa</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">czysta poprawka</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">ponownie zainfekowana</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:xx</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">Łącznie 5 złośliwych wersji, przeplatanych z czystymi przez ~3 godziny</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Złośliwa (hook preinstall aktywny)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Czysta (hook usunięty)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Zrekonstruowano na podstawie doniesień The Hacker News, StepSecurity i SafeDep. Czasy w UTC.</p>
</div>
<div class="it">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Cronologia release npm di jscrambler (11 lug, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">dannosa</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">correzione pulita</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">reinfettata</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:xx</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">5 versioni dannose in totale, alternate a versioni pulite in ~3 ore</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Dannosa (hook preinstall attivo)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Pulita (hook rimosso)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Ricostruito dalle notizie di The Hacker News, StepSecurity e SafeDep. Orari in UTC.</p>
</div>
<div class="ru">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">Хронология релизов npm jscrambler (11 июля, UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">вредоносная</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">чистое исправление</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">повторное заражение</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:xx</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">Всего 5 вредоносных версий, чередовавшихся с чистыми в течение ~3 часов</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">Вредоносная (хук preinstall активен)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">Чистая (хук удалён)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">Реконструировано по материалам The Hacker News, StepSecurity и SafeDep. Время указано в UTC.</p>
</div>
<div class="zh">
<svg viewBox="0 0 700 400" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:auto;background:#111113;border-radius:12px;border:1px solid rgba(255,255,255,.08);margin:20px 0">
  <text x="20" y="32" fill="#fafafa" font-size="16" font-weight="700" font-family="sans-serif">jscrambler npm發布時間軸(7月11日,UTC)</text>
  <g font-family="sans-serif">
    <line x1="50" y1="200" x2="660" y2="200" stroke="#3f3f46" stroke-width="3"/>
    <circle cx="90" cy="200" r="9" fill="#f87171"/>
    <text x="90" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.14.0</text>
    <text x="90" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">惡意</text>
    <text x="90" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">15:12</text>
    <circle cx="330" cy="200" r="9" fill="#4ade80"/>
    <text x="330" y="170" fill="#4ade80" font-size="14" font-weight="700" text-anchor="middle">8.15.0</text>
    <text x="330" y="150" fill="#a1a1aa" font-size="13" text-anchor="middle">乾淨修復</text>
    <text x="330" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:07</text>
    <circle cx="410" cy="200" r="9" fill="#f87171"/>
    <text x="410" y="170" fill="#f87171" font-size="14" font-weight="700" text-anchor="middle">8.16.0</text>
    <text x="410" y="150" fill="#fbbf24" font-size="13" text-anchor="middle">再次感染</text>
    <text x="410" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">17:26</text>
    <circle cx="500" cy="200" r="7" fill="#f87171"/>
    <circle cx="560" cy="200" r="7" fill="#f87171"/>
    <circle cx="620" cy="200" r="7" fill="#f87171"/>
    <text x="560" y="170" fill="#f87171" font-size="13" text-anchor="middle">8.17.0 / 8.18.0 / 8.20.0</text>
    <text x="560" y="230" fill="#d4d4d8" font-size="13" text-anchor="middle">~18:xx</text>
    <text x="350" y="290" fill="#a1a1aa" font-size="14" text-anchor="middle">共5個惡意版本,約3小時內與乾淨版本交替發布</text>
    <rect x="60" y="330" width="18" height="18" fill="#f87171"/>
    <text x="86" y="344" fill="#d4d4d8" font-size="13">惡意版本(preinstall鉤子啟用中)</text>
    <rect x="400" y="330" width="18" height="18" fill="#4ade80"/>
    <text x="426" y="344" fill="#d4d4d8" font-size="13">乾淨版本(鉤子已移除)</text>
  </g>
</svg>
<p style="font-size:11px;color:#52525b;margin-top:-10px">根據The Hacker News、StepSecurity與SafeDep報導重建。時間為UTC。</p>
</div>

<div class="box ko">💡 <strong>지금 지켜봐야 할 것:</strong> (1) jscrambler의 게시 토큰·계정 접근권 회수를 포함한 사고 전말 공개 여부, (2) 3시간의 배포 창구 동안 영향을 받은 하위 프로젝트 규모와 통보 여부, (3) 해당 시간대 개발 도구를 설치한 메타마스크·팬텀·이그저더스 지갑의 온체인 자금 이동 여부. 해당 시간대에 jscrambler를 설치했다면 니모닉을 새 지갑으로 즉시 이전하고 AWS·클라우드 자격증명을 회전할 것을 권고한다.</div>
<div class="box en">💡 <strong>What to watch now:</strong> (1) whether jscrambler discloses a full incident report confirming publish-token and account access revocation; (2) the scale of downstream projects affected during the three-hour window and whether they get notified; (3) whether on-chain data shows fund movement from MetaMask, Phantom, or Exodus wallets belonging to developers who installed the tool during that window. Anyone who installed jscrambler during that window should immediately migrate funds to a new wallet with a fresh seed phrase and rotate AWS/cloud credentials.</div>
<div class="box ja">💡 <strong>今後注視すべきこと:</strong> (1) jscramblerが配布トークン・アカウントアクセス権の回収を含む事故の全容を公開するか、(2) 3時間の配布期間中に影響を受けた下流プロジェクトの規模と通知の有無、(3) その時間帯に開発ツールをインストールしたメタマスク・ファントム・エクソダスウォレットのオンチェーン資金移動の有無である。その時間帯にjscramblerをインストールした場合は、直ちに新しいシードフレーズのウォレットへ資金を移し、AWS・クラウド認証情報をローテーションすることを推奨する。</div>
<div class="box es">💡 <strong>Qué vigilar ahora:</strong> (1) si jscrambler divulga un informe completo del incidente que confirme la revocación del token de publicación y del acceso a la cuenta; (2) la escala de proyectos posteriores afectados durante la ventana de tres horas y si son notificados; (3) si los datos on-chain muestran movimiento de fondos desde wallets de MetaMask, Phantom o Exodus pertenecientes a desarrolladores que instalaron la herramienta durante esa ventana. Quien haya instalado jscrambler en ese período debería migrar de inmediato sus fondos a una wallet nueva con una frase semilla distinta y rotar sus credenciales de AWS/nube.</div>
<div class="box de">💡 <strong>Worauf jetzt zu achten ist:</strong> (1) ob jscrambler einen vollständigen Vorfallsbericht veröffentlicht, der den Widerruf von Publish-Token und Kontozugriff bestätigt; (2) das Ausmaß betroffener nachgelagerter Projekte während des dreistündigen Zeitfensters und ob sie benachrichtigt werden; (3) ob On-Chain-Daten Geldbewegungen aus MetaMask-, Phantom- oder Exodus-Wallets von Entwicklern zeigen, die das Tool in diesem Zeitfenster installiert haben. Wer jscrambler in diesem Zeitraum installiert hat, sollte Gelder sofort in ein neues Wallet mit neuer Seed-Phrase migrieren und AWS-/Cloud-Zugangsdaten rotieren.</div>
<div class="box fr">💡 <strong>À surveiller maintenant :</strong> (1) si jscrambler publie un rapport d'incident complet confirmant la révocation du jeton de publication et de l'accès au compte ; (2) l'ampleur des projets en aval affectés pendant la fenêtre de trois heures et s'ils sont notifiés ; (3) si les données on-chain montrent des mouvements de fonds depuis des wallets MetaMask, Phantom ou Exodus appartenant à des développeurs ayant installé l'outil pendant cette fenêtre. Quiconque a installé jscrambler durant cette période devrait migrer immédiatement ses fonds vers un nouveau wallet avec une nouvelle phrase de récupération et renouveler ses identifiants AWS/cloud.</div>
<div class="box pt">💡 <strong>O que observar agora:</strong> (1) se o jscrambler divulgará um relatório completo do incidente confirmando a revogação do token de publicação e do acesso à conta; (2) a escala de projetos a jusante afetados durante a janela de três horas e se serão notificados; (3) se os dados on-chain mostram movimentação de fundos de carteiras MetaMask, Phantom ou Exodus pertencentes a desenvolvedores que instalaram a ferramenta nessa janela. Quem instalou o jscrambler nesse período deve migrar imediatamente os fundos para uma nova carteira com uma frase-semente nova e rotacionar as credenciais de AWS/nuvem.</div>
<div class="box tr">💡 <strong>Şimdi izlenmesi gerekenler:</strong> (1) jscrambler'ın yayınlama belirteci ve hesap erişiminin iptal edildiğini doğrulayan tam bir olay raporu yayınlayıp yayınlamayacağı; (2) üç saatlik pencere sırasında etkilenen alt projelerin ölçeği ve bilgilendirilip bilgilendirilmeyecekleri; (3) zincir üstü verilerin, o pencere sırasında aracı kuran geliştiricilere ait MetaMask, Phantom veya Exodus cüzdanlarından fon hareketi gösterip göstermeyeceği. O dönemde jscrambler kuran herkesin fonlarını derhal yeni bir kurtarma ifadesine sahip yeni bir cüzdana taşıması ve AWS/bulut kimlik bilgilerini değiştirmesi öneriliyor.</div>
<div class="box vi">💡 <strong>Điều cần theo dõi lúc này:</strong> (1) liệu jscrambler có công bố báo cáo sự cố đầy đủ xác nhận việc thu hồi token phát hành và quyền truy cập tài khoản hay không; (2) quy mô các dự án hạ nguồn bị ảnh hưởng trong khoảng cửa sổ ba giờ và liệu họ có được thông báo hay không; (3) liệu dữ liệu on-chain có cho thấy dịch chuyển tiền từ ví MetaMask, Phantom hay Exodus của các nhà phát triển đã cài công cụ trong khoảng thời gian đó hay không. Bất kỳ ai đã cài jscrambler trong khoảng thời gian đó nên ngay lập tức chuyển tiền sang ví mới với cụm từ khôi phục mới và xoay vòng thông tin xác thực AWS/đám mây.</div>
<div class="box id">💡 <strong>Yang perlu diperhatikan sekarang:</strong> (1) apakah jscrambler mengungkap laporan insiden lengkap yang mengonfirmasi pencabutan token publikasi dan akses akun; (2) skala proyek hilir yang terdampak selama jendela waktu tiga jam tersebut dan apakah mereka diberi tahu; (3) apakah data on-chain menunjukkan pergerakan dana dari dompet MetaMask, Phantom, atau Exodus milik pengembang yang menginstal alat tersebut selama jendela waktu itu. Siapa pun yang menginstal jscrambler selama jendela waktu itu sebaiknya segera memindahkan dana ke dompet baru dengan seed phrase yang baru dan merotasi kredensial AWS/cloud.</div>
<div class="box pl">💡 <strong>Na co teraz uważać:</strong> (1) czy jscrambler ujawni pełny raport z incydentu potwierdzający odwołanie tokenu publikacji i dostępu do konta; (2) skalę projektów niższego szczebla dotkniętych w trakcie trzygodzinnego okna czasowego oraz czy zostaną powiadomione; (3) czy dane on-chain pokazują przepływ środków z portfeli MetaMask, Phantom lub Exodus należących do deweloperów, którzy zainstalowali narzędzie w tym okresie. Każdy, kto zainstalował jscrambler w tym okresie, powinien natychmiast przenieść środki do nowego portfela z nową frazą seed oraz zmienić dane uwierzytelniające AWS/chmura.</div>
<div class="box it">💡 <strong>Cosa osservare ora:</strong> (1) se jscrambler pubblicherà un rapporto completo sull'incidente che confermi la revoca del token di pubblicazione e dell'accesso all'account; (2) la portata dei progetti a valle interessati durante la finestra di tre ore e se vengono avvisati; (3) se i dati on-chain mostrano movimenti di fondi da wallet MetaMask, Phantom o Exodus appartenenti a sviluppatori che hanno installato lo strumento durante quella finestra. Chiunque abbia installato jscrambler durante quella finestra dovrebbe migrare immediatamente i fondi verso un nuovo wallet con una nuova seed phrase e ruotare le credenziali AWS/cloud.</div>
<div class="box ru">💡 <strong>На что обратить внимание сейчас:</strong> (1) раскроет ли jscrambler полный отчёт об инциденте с подтверждением отзыва токена публикации и доступа к аккаунту; (2) масштаб затронутых нижестоящих проектов за трёхчасовое окно и будут ли они уведомлены; (3) показывают ли ончейн-данные движение средств из кошельков MetaMask, Phantom или Exodus, принадлежащих разработчикам, которые установили инструмент в это окно. Всем, кто устанавливал jscrambler в это окно, следует немедленно перевести средства в новый кошелёк с новой seed-фразой и сменить учётные данные AWS/облака.</div>
<div class="box zh">💡 <strong>現在該關注的重點:</strong>(1)jscrambler是否會公布完整事故報告,確認發布權杖與帳號存取權限已被撤銷;(2)在這三小時視窗期間受影響的下游專案規模,以及他們是否會收到通知;(3)鏈上資料是否顯示在該視窗期間安裝該工具的開發者所屬MetaMask、Phantom或Exodus錢包有資金移動。任何在該視窗期間安裝過jscrambler的人,都應立即將資金遷移到使用全新助記詞的新錢包,並更換AWS/雲端憑證。</div>

<p class="ko" style="font-size:12px;color:#52525b;margin-top:24px">출처: 더해커뉴스(The Hacker News), 스텝시큐리티(StepSecurity), 세이프뎁(SafeDep).</p>
<p class="en" style="font-size:12px;color:#52525b;margin-top:24px">Sources: The Hacker News, StepSecurity, SafeDep.</p>
<p class="ja" style="font-size:12px;color:#52525b;margin-top:24px">出典: The Hacker News、StepSecurity、SafeDep。</p>
<p class="es" style="font-size:12px;color:#52525b;margin-top:24px">Fuentes: The Hacker News, StepSecurity, SafeDep.</p>
<p class="de" style="font-size:12px;color:#52525b;margin-top:24px">Quellen: The Hacker News, StepSecurity, SafeDep.</p>
<p class="fr" style="font-size:12px;color:#52525b;margin-top:24px">Sources : The Hacker News, StepSecurity, SafeDep.</p>
<p class="pt" style="font-size:12px;color:#52525b;margin-top:24px">Fontes: The Hacker News, StepSecurity, SafeDep.</p>
<p class="tr" style="font-size:12px;color:#52525b;margin-top:24px">Kaynaklar: The Hacker News, StepSecurity, SafeDep.</p>
<p class="vi" style="font-size:12px;color:#52525b;margin-top:24px">Nguồn: The Hacker News, StepSecurity, SafeDep.</p>
<p class="id" style="font-size:12px;color:#52525b;margin-top:24px">Sumber: The Hacker News, StepSecurity, SafeDep.</p>
<p class="pl" style="font-size:12px;color:#52525b;margin-top:24px">Źródła: The Hacker News, StepSecurity, SafeDep.</p>
<p class="it" style="font-size:12px;color:#52525b;margin-top:24px">Fonti: The Hacker News, StepSecurity, SafeDep.</p>
<p class="ru" style="font-size:12px;color:#52525b;margin-top:24px">Источники: The Hacker News, StepSecurity, SafeDep.</p>
<p class="zh" style="font-size:12px;color:#52525b;margin-top:24px">資料來源:The Hacker News、StepSecurity、SafeDep。</p>
<?php require __DIR__.'/_footer.php'; ?>
