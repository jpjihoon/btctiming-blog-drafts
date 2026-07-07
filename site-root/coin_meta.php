<?php
// 코인 메타(이름·색) 마스터. 자동 코인목록에 등장하는 심볼의 표시 정보를 제공.
// 여기 없는 새 코인은 update_coins.php가 심볼명 + 자동생성 색으로 채운다.
const COIN_META_MASTER = [
    'BTC' => ['Bitcoin', '#F7931A'],
    'ETH' => ['Ethereum', '#627EEA'],
    'BNB' => ['BNB', '#F3BA2F'],
    'SOL' => ['Solana', '#9945FF'],
    'XRP' => ['XRP', '#00AAE4'],
    'DOGE' => ['Dogecoin', '#C2A633'],
    'ADA' => ['Cardano', '#0033AD'],
    'TRX' => ['TRON', '#FF0013'],
    'AVAX' => ['Avalanche', '#E84142'],
    'LINK' => ['Chainlink', '#2A5ADA'],
    'DOT' => ['Polkadot', '#E6007A'],
    'POL' => ['Polygon', '#8247E5'],
    'LTC' => ['Litecoin', '#BFBBBB'],
    'BCH' => ['Bitcoin Cash', '#0AC18E'],
    'NEAR' => ['NEAR', '#00EC97'],
    'UNI' => ['Uniswap', '#FF007A'],
    'APT' => ['Aptos', '#4CB4A4'],
    'ICP' => ['Internet Computer', '#3B00B9'],
    'ATOM' => ['Cosmos', '#2E3148'],
    'XLM' => ['Stellar', '#14B6E7'],
    'ETC' => ['Ethereum Classic', '#328332'],
    'FIL' => ['Filecoin', '#0090FF'],
    'HBAR' => ['Hedera', '#8A94A6'],
    'ARB' => ['Arbitrum', '#28A0F0'],
    'OP' => ['Optimism', '#FF0420'],
    'VET' => ['VeChain', '#15BDFF'],
    'INJ' => ['Injective', '#00D2FF'],
    'SUI' => ['Sui', '#4DA2FF'],
    'AAVE' => ['Aave', '#B6509E'],
    'GRT' => ['The Graph', '#6747ED'],
    'ALGO' => ['Algorand', '#9CA3AF'],
    'SEI' => ['Sei', '#8B1E2B'],
    'RUNE' => ['THORChain', '#00CCFF'],
    'S' => ['Sonic', '#1969FF'],
    'TIA' => ['Celestia', '#7B2BF9'],
    'IMX' => ['Immutable', '#3B82F6'],
    'RENDER' => ['Render', '#CF1011'],
    'SKY' => ['Sky', '#1AAB9B'],
    'LDO' => ['Lido DAO', '#00A3FF'],
    'STX' => ['Stacks', '#5546FF'],
    'THETA' => ['Theta', '#2AB8E6'],
    'SAND' => ['The Sandbox', '#00ADEF'],
    'AXS' => ['Axie Infinity', '#0055D5'],
    'MANA' => ['Decentraland', '#FF2D55'],
    'FLOW' => ['Flow', '#00EF8B'],
    'CHZ' => ['Chiliz', '#CD0124'],
    'GALA' => ['Gala', '#B0B7C3'],
    'A' => ['Vaulta', '#8B9DC3'],
    'PEPE' => ['Pepe', '#3D8130'],
    'SHIB' => ['Shiba Inu', '#FFA409'],
];

// 스테이블코인·법정화폐 토큰 (거래량 상위에 섞이지만 제외 대상)
const STABLECOINS = ['USDT','USDC','FDUSD','TUSD','BUSD','DAI','USDP','USDD','GUSD','EURT','EUR','AEUR','USTC','PYUSD','FRAX','USDE','USD1','RLUSD','USDS','USDX','USDG','GHO','LUSD','CRVUSD','USD0','USDB','EURC','EURI','XUSD','BUIDL','USDf','FDUSD','USDL','DEUSD'];

// 레버리지/특수 토큰 접미사·키워드 (제외)
const EXCLUDE_KEYWORDS = ['UP','DOWN','BULL','BEAR','3L','3S','5L','5S'];

// 코인 심볼로 표시 메타 얻기 (마스터에 있으면 사용, 없으면 자동 생성)
function coinMeta(string $id): array {
    if (isset(COIN_META_MASTER[$id])) {
        return ['name' => COIN_META_MASTER[$id][0], 'color' => COIN_META_MASTER[$id][1]];
    }
    // 마스터에 없는 새 코인: 이름은 심볼 그대로, 색은 심볼 해시로 생성(구별용)
    $h = crc32($id);
    $hue = $h % 360;
    return ['name' => $id, 'color' => hsl_to_hex($hue, 62, 58)];
}
function hsl_to_hex(int $h, int $s, int $l): string {
    $s/=100; $l/=100;
    $c = (1 - abs(2*$l - 1)) * $s;
    $x = $c * (1 - abs(fmod($h/60, 2) - 1));
    $m = $l - $c/2;
    if ($h<60){$r=$c;$g=$x;$b=0;} elseif($h<120){$r=$x;$g=$c;$b=0;}
    elseif($h<180){$r=0;$g=$c;$b=$x;} elseif($h<240){$r=0;$g=$x;$b=$c;}
    elseif($h<300){$r=$x;$g=0;$b=$c;} else {$r=$c;$g=0;$b=$x;}
    return sprintf('#%02X%02X%02X', round(($r+$m)*255), round(($g+$m)*255), round(($b+$m)*255));
}
