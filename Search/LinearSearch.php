<?php

printf("テスト結果は「%s」です。", testLinearSearch());

/**
 * 線形探索
 *
 * @param array $data
 * @param int $target
 * @return int
 */
function linearSearch(array $data, int $target): int
{
    foreach ($data as $key => $value) {
        if ($value === $target) {
            return $key;
        }
    }
}

/**
 * テストコード
 */
function testLinearSearch(): string
{
    for ($i = 0; $i < 1000; $i++) {
        $data = range(0, 100);
        shuffle($data);
        $max = count($data);
        $target_key = rand(0, $max-1); // サイコロ
        $key = linearSearch($data, $data[$target_key]);

        if ($data[$key] !== $data[$target_key])
        {
            return '失敗';
        }
    }
    return '成功';
}
