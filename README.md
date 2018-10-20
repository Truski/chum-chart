# chumchart
Make a D&amp;D alignment chart with your friends.  Send your friends a link so they can take a quiz.  Once you and eight of your friends have completed the survey, ChumChart will generate an alignment chart of you and your friends.

## Database Overview
```
+-------------+
|    Chart    |       +------------+
+-------------+       |   Survey   |
|  id         | <-+   +------------+
|  urlid      |   |   |  id        |
|  usrcount   |   +-- |  chartid   |
|  lg         |       |  morality  |
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

## Survey to Alignment Algorithm

1. Calculate distances from each point to each corner of square.
    1. Select the minimum distance to a corner that hasn't been taken.
    2. Put selected point with corner value.
    3. Repeat til all corners filled?
2. Calculate distance from remaining points to each midpoint of edges of square.
    1. Select the minimum distance to a edge that hasn't been taken.
    2. Put selected point with edge value.
    3. Repeat til all edge filled?
3. Last point assign to true neutral.