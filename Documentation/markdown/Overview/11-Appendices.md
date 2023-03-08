# PHPExcel Developer Documentation

## Credits

Please refer to the internet page [http://www.codeplex.com/PHPExcel/Wiki/View.aspx?title=Credits&referringTitle=Home][22] for up-to-date credits.

## Valid array keys for style applyFromArray()

The following table lists the valid array keys for PHPExcel_Style applyFromArray() classes. If the "Maps to property"� column maps a key to a setter, the value provided for that key will be applied directly. If the "Maps to property" column maps a key to a getter, the value provided for that key will be applied as another style array.

**PHPExcel_Style**

    Array key    | Maps to property
    -------------|-------------------
    fill         | getFill()
    font         | getFont()
    borders      | getBorders()
    alignment    | getAlignment()
    numberformat | getNumberFormat()
    protection   | getProtection()

**PHPExcel_Style_Fill**

    Array key  | Maps to property
    -----------|-------------------
    type       | setFillType()
    rotation   | setRotation()
    startcolor | getStartColor()
    endcolor   | getEndColor()
    color      | getStartColor()

**PHPExcel_Style_Font**

    Array key   | Maps to property
    ------------|-------------------
    name        | setName()
    bold        | setBold()
    italic      | setItalic()
    underline   | setUnderline()
    strike      | setStrikethrough()
    color       | getColor()
    size        | setSize()
    superScript | setSuperScript()
    subScript   | setSubScript()

**PHPExcel_Style_Borders**

    Array key         | Maps to property
    ------------------|-------------------
    allborders        | getLeft(); getRight(); getTop(); getBottom()
    left              | getLeft()
    right             | getRight()
    top               | getTop()
    bottom            | getBottom()
    diagonal          | getDiagonal()
    vertical          | getVertical()
    horizontal        | getHorizontal()
    diagonaldirection | setDiagonalDirection()
    outline           | setOutline()

**PHPExcel_Style_Border**

    Array key | Maps to property
    ----------|-------------------
    style     | setBorderStyle()
    color     | getColor()

**PHPExcel_Style_Alignment**

    Array key   | Maps to property
    ------------|-------------------
    horizontal  | setHorizontal()
    vertical    | setVertical()
    rotation    | setTextRotation()
    wrap        | setWrapText()
    shrinkToFit | setShrinkToFit()
    indent      | setIndent()

**PHPExcel_Style_NumberFormat**

    Array key | Maps to property
    ----------|-------------------
    code      | setFormatCode()

**PHPExcel_Style_Protection**

    Array key | Maps to property
    ----------|-------------------
    locked    | setLocked()
    hidden    | setHidden()

[22]: http://www.codeplex.com/PHPExcel/Wiki/View.aspx?title=Credits&referringTitle=Home
