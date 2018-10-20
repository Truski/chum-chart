# chumchart
Make a D&amp;D alignment chart with your friends.  Send your friends a link so they can take a quiz.  Once you and eight of your friends have completed the survey, ChumChart will generate an alignment chart of you and your friends.

## Database Overview
```
+-------------+
|    Chart    |            +------------+
+-------------+            |   Survey   |
|  id         | <----+     +------------+
|  urlid      |   +--|---> |  id        |
|  usrcount   |   |  +---- |  chartid   |
|  creator    | --+        |  morality  |
|  lg         | --+        |  ethics    |
|  ln         | --+        |  name      |
|  lc         | --+        |  email     |
|  ng         | --+        +------------+
|  tn         | --+
|  ne         | --+
|  cg         | --+
|  cn         | --+
|  ce         | --+
+-------------+
```

## Survey to Score Algorithm
* Every question will have a weight of either -1, -1/3, 1/3, or 1 in either the ethics or morality axis.
* We will take the average of all question weights to produce a score for morality and a score for ethics.

## Score to Alignment Algorithm (FAILURE)
1. Calculate distances from each point to each corner of square.
    1. Select the minimum distance to a corner that hasn't been taken.
    2. Put selected point with corner value.
    3. Repeat til all corners filled?
2. Calculate distance from remaining points to each midpoint of edges of square.
    1. Select the minimum distance to a edge that hasn't been taken.
    2. Put selected point with edge value.
    3. Repeat til all edge filled?
3. Last point assign to true neutral.

## New Algorithm from Score to Alignment
1. Examine every permutation of the 9 points to corners.  Calculate the distance between each point to its assigned corner.  The optimal solution is the least value.