
## Usage

ビルド
```
ClosureTable % docker-compose build --no-cache
ClosureTable % docker-compose up -d
```

実行
```
ClosureTable % docker-compose exec closuretable-app ./main

Root
--Child A
----Grandchild A1
----Grandchild A2
--Child B
----Grandchild B1
```

## 経路取得

```
SELECT * FROM closure_table
WHERE descendant = 4
ORDER BY path_length DESC;
```

## 子孫取得

```
SELECT * FROM closure_table
WHERE ancestor = 1;
```

## 6の下に7を追加

7自身を追加
```
INSERT INTO closure_table (ancestor, descendant, path_length)
VALUES (7, 7, 0);
```

6の先祖を取得
```
SELECT * FROM closure_table
WHERE descendant = 6
ORDER BY path_length DESC;
```

6の先祖を7の先祖として追加
```
INSERT INTO closure_table (ancestor, descendant, path_length)
SELECT ancestor, 7, path_length + 1
FROM closure_table
WHERE descendant = 6;
```

## 4を削除する場合

削除するノード4のすべての子孫を特定
```
SELECT descendant FROM closure_table
WHERE ancestor = 4 AND descendant != 4;
```

ノード4のすべての子孫を削除
```
DELETE FROM closure_table
WHERE descendant IN (
    SELECT descendant FROM closure_table
    WHERE ancestor = 4 AND descendant != 4
);
```

ノード4を削除
```
DELETE FROM closure_table
WHERE descendant = 4;
```
