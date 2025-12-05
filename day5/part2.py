import numpy as np

with open("dataset") as f:
    lines = [line.strip() for line in f]

empty_line = lines.index('')
lines_with_intervals = lines[:empty_line]

intervals = np.array([list(map(int, interval.split("-"))) for interval in lines_with_intervals])
intervals = intervals[np.argsort(intervals[:, 0])]

merged_intervals = [ intervals[0].copy() ]
for left, right in intervals[1:]:
    interval = merged_intervals[-1]
    if left <= interval[1]:
        interval[1] = max(interval[1], right)
    else:
        merged_intervals.append(np.array([left, right]))

result = np.array(merged_intervals)
length = result[:, 1] - result[:, 0] + 1

print("De code is: ", length.sum())