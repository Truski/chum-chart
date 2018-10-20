# chumchart
Make a D&amp;D Alignment Chart with your Friends

## Database Overview
```
+-------------+
|    Chart    |       +------------+
+-------------+       |   Survey   |
|  id         | <-+   +------------+
|  urlid      |   |   |  id        |
|  usrcount   |   |   |  chartid   |
|  lg         |   +-- |  morality  |
|  ln         |       |  ethics    |
|  lc         |       |  name      |
|  ng         |       |  email     |
|  tn         |       +------------+
|  ne         |
|  cg         |
|  cn         |
|  ce         |
+-------------+
```