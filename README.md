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

