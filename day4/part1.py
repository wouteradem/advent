import numpy as np

from scipy.signal import convolve2d

with open("dataset") as f:
    lines = [line.strip() for line in f]

grid = np.array([[1 if c == '@' else 0 for c in row] for row in lines])
print(grid)

kernel = np.ones((3, 3), dtype=int)
conv = convolve2d(grid, kernel, mode='same', boundary='fill', fillvalue=0)

print(conv)

new_grid = np.where((grid == 1) & (conv <= 4), conv, 0)

print("De code is:", (new_grid > 0).sum())